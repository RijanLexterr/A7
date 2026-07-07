<?php
require_once __DIR__ . '/db.php';
require_login();

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

const SELECT_JOINED = "
    SELECT
        a.*,
        c.full_name  AS customer_name,
        c.contact_number AS customer_contact,
        c.address    AS customer_address,
        t.plate_number,
        t.truck_type
    FROM assignments a
    JOIN customers c ON c.id = a.customer_id
    JOIN trucks t     ON t.id = a.truck_id
";

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = db()->prepare(SELECT_JOINED . ' WHERE a.id = ?');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) json_error('Assignment not found.', 404);
            json_success($row);
        }

        $search = clean_str($_GET['search'] ?? '');
        $status = clean_str($_GET['status'] ?? '');
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $perPage = min(100, max(1, (int) ($_GET['per_page'] ?? 20)));
        $offset = ($page - 1) * $perPage;

        $where = 'WHERE 1=1';
        $params = [];
        if ($search) {
            $where .= ' AND (a.receipt_no LIKE ? OR c.full_name LIKE ? OR t.plate_number LIKE ?)';
            $like = '%' . $search . '%';
            $params = [$like, $like, $like];
        }
        if ($status) {
            $where .= ' AND a.status = ?';
            $params[] = $status;
        }

        $countSql = "SELECT COUNT(*) AS total FROM assignments a
                     JOIN customers c ON c.id = a.customer_id
                     JOIN trucks t ON t.id = a.truck_id $where";
        $countStmt = db()->prepare($countSql);
        $countStmt->execute($params);
        $total = (int) $countStmt->fetch()['total'];

        $stmt = db()->prepare(SELECT_JOINED . " $where ORDER BY a.created_at DESC LIMIT $perPage OFFSET $offset");
        $stmt->execute($params);

        json_success([
            'items' => $stmt->fetchAll(),
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ]);
        break;

    case 'POST':
        $b = get_json_body();
        $data = validate_assignment($b);

        $pdo = db();
        $pdo->beginTransaction();
        try {
            $receiptNo = generate_receipt_no($pdo);

            $stmt = $pdo->prepare('INSERT INTO assignments
                (receipt_no, customer_id, truck_id, driver_name, service_type, pickup_location,
                 destination, duration, amount, status, remarks, date_assigned)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
            $stmt->execute([
                $receiptNo, $data['customer_id'], $data['truck_id'], $data['driver_name'],
                $data['service_type'], $data['pickup_location'], $data['destination'],
                $data['duration'], $data['amount'], $data['status'], $data['remarks'],
                $data['date_assigned'],
            ]);
            $newId = $pdo->lastInsertId();

            sync_truck_status($pdo, $data['truck_id'], $data['status']);

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            json_error('Could not save assignment: ' . $e->getMessage(), 500);
        }

        json_success(['id' => (int) $newId, 'receipt_no' => $receiptNo], 201);
        break;

    case 'PUT':
        if (!$id) json_error('Missing assignment id.');
        $b = get_json_body();
        $data = validate_assignment($b);

        $pdo = db();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare('UPDATE assignments SET
                customer_id = ?, truck_id = ?, driver_name = ?, service_type = ?,
                pickup_location = ?, destination = ?, duration = ?, amount = ?,
                status = ?, remarks = ?, date_assigned = ?
                WHERE id = ?');
            $stmt->execute([
                $data['customer_id'], $data['truck_id'], $data['driver_name'], $data['service_type'],
                $data['pickup_location'], $data['destination'], $data['duration'], $data['amount'],
                $data['status'], $data['remarks'], $data['date_assigned'], $id,
            ]);

            sync_truck_status($pdo, $data['truck_id'], $data['status']);

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            json_error('Could not update assignment: ' . $e->getMessage(), 500);
        }

        json_success(['id' => $id]);
        break;

    case 'DELETE':
        if (!$id) json_error('Missing assignment id.');
        $stmt = db()->prepare('DELETE FROM assignments WHERE id = ?');
        $stmt->execute([$id]);
        json_success(['id' => $id, 'deleted' => true]);
        break;

    default:
        json_error('Method not allowed.', 405);
}

function validate_assignment(array $b): array
{
    $customerId = (int) ($b['customer_id'] ?? 0);
    $truckId = (int) ($b['truck_id'] ?? 0);
    $driverName = clean_str($b['driver_name'] ?? '');
    $serviceType = clean_str($b['service_type'] ?? '');
    $pickup = clean_str($b['pickup_location'] ?? '');
    $destination = clean_str($b['destination'] ?? '');
    $status = clean_str($b['status'] ?? 'Pending');
    $dateAssigned = clean_str($b['date_assigned'] ?? '');

    if (!$customerId) json_error('Please select a customer.');
    if (!$truckId) json_error('Please select a truck/equipment.');
    if (!$driverName) json_error('Driver/operator name is required.');
    if (!in_array($serviceType, ['Hauling', 'Equipment Rental', 'Site Preparation'], true)) {
        json_error('Please select a valid service type.');
    }
    if (!$pickup) json_error('Pickup location is required.');
    if (!$destination) json_error('Destination/site is required.');
    if (!in_array($status, ['Pending', 'Ongoing', 'Completed'], true)) {
        json_error('Invalid status.');
    }
    if (!$dateAssigned) json_error('Date of assignment is required.');

    $amount = isset($b['amount']) && $b['amount'] !== '' ? (float) $b['amount'] : null;

    // Confirm customer & truck actually exist
    $c = db()->prepare('SELECT id FROM customers WHERE id = ? AND is_archived = 0');
    $c->execute([$customerId]);
    if (!$c->fetch()) json_error('Selected customer was not found.');

    $t = db()->prepare('SELECT id FROM trucks WHERE id = ? AND is_archived = 0');
    $t->execute([$truckId]);
    if (!$t->fetch()) json_error('Selected truck/equipment was not found.');

    return [
        'customer_id' => $customerId,
        'truck_id' => $truckId,
        'driver_name' => $driverName,
        'service_type' => $serviceType,
        'pickup_location' => $pickup,
        'destination' => $destination,
        'duration' => clean_str($b['duration'] ?? ''),
        'amount' => $amount,
        'status' => $status,
        'remarks' => clean_str($b['remarks'] ?? ''),
        'date_assigned' => $dateAssigned,
    ];
}

function generate_receipt_no(PDO $pdo): string
{
    $year = date('Y');
    $stmt = $pdo->prepare("SELECT COUNT(*) AS cnt FROM assignments WHERE receipt_no LIKE ?");
    $stmt->execute(["HMCF-$year-%"]);
    $count = (int) $stmt->fetch()['cnt'];
    $next = str_pad((string) ($count + 1), 4, '0', STR_PAD_LEFT);
    return "HMCF-$year-$next";
}

function sync_truck_status(PDO $pdo, int $truckId, string $assignmentStatus): void
{
    // Completed jobs free up the truck again; Pending/Ongoing marks it Assigned.
    $newStatus = $assignmentStatus === 'Completed' ? 'Available' : 'Assigned';
    $stmt = $pdo->prepare('UPDATE trucks SET status = ? WHERE id = ?');
    $stmt->execute([$newStatus, $truckId]);
}
