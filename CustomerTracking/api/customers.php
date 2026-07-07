<?php
require_once __DIR__ . '/db.php';
require_login();

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = db()->prepare('SELECT * FROM customers WHERE id = ? AND is_archived = 0');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) json_error('Customer not found.', 404);
            json_success($row);
        }

        // List with optional search + pagination
        $search = clean_str($_GET['search'] ?? '');
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $perPage = min(100, max(1, (int) ($_GET['per_page'] ?? 20)));
        $offset = ($page - 1) * $perPage;

        $where = 'WHERE is_archived = 0';
        $params = [];
        if ($search) {
            $where .= ' AND (full_name LIKE ? OR contact_number LIKE ? OR contact_person LIKE ? OR email LIKE ?)';
            $like = '%' . $search . '%';
            $params = [$like, $like, $like, $like];
        }

        $countStmt = db()->prepare("SELECT COUNT(*) AS total FROM customers $where");
        $countStmt->execute($params);
        $total = (int) $countStmt->fetch()['total'];

        $stmt = db()->prepare("SELECT * FROM customers $where ORDER BY created_at DESC LIMIT $perPage OFFSET $offset");
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        json_success([
            'items' => $rows,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ]);
        break;

    case 'POST':
        $b = get_json_body();
        $data = validate_customer($b);

        $stmt = db()->prepare('INSERT INTO customers
            (customer_type, full_name, contact_person, contact_number, email, address, project_site, remarks)
            VALUES (?,?,?,?,?,?,?,?)');
        $stmt->execute([
            $data['customer_type'], $data['full_name'], $data['contact_person'],
            $data['contact_number'], $data['email'], $data['address'],
            $data['project_site'], $data['remarks'],
        ]);

        $newId = db()->lastInsertId();
        json_success(['id' => (int) $newId], 201);
        break;

    case 'PUT':
        if (!$id) json_error('Missing customer id.');
        $b = get_json_body();
        $data = validate_customer($b);

        $stmt = db()->prepare('UPDATE customers SET
            customer_type = ?, full_name = ?, contact_person = ?, contact_number = ?,
            email = ?, address = ?, project_site = ?, remarks = ?
            WHERE id = ?');
        $stmt->execute([
            $data['customer_type'], $data['full_name'], $data['contact_person'],
            $data['contact_number'], $data['email'], $data['address'],
            $data['project_site'], $data['remarks'], $id,
        ]);

        json_success(['id' => $id]);
        break;

    case 'DELETE':
        if (!$id) json_error('Missing customer id.');
        // Soft delete (archive) so past receipts keep their customer reference intact
        $stmt = db()->prepare('UPDATE customers SET is_archived = 1 WHERE id = ?');
        $stmt->execute([$id]);
        json_success(['id' => $id, 'archived' => true]);
        break;

    default:
        json_error('Method not allowed.', 405);
}

function validate_customer(array $b): array
{
    $type = clean_str($b['customer_type'] ?? '');
    $fullName = clean_str($b['full_name'] ?? '');
    $contactNumber = clean_str($b['contact_number'] ?? '');
    $address = clean_str($b['address'] ?? '');

    if (!in_array($type, ['Individual', 'Company'], true)) {
        json_error('Customer type must be Individual or Company.');
    }
    if (!$fullName) json_error('Full name / company name is required.');
    if (!$contactNumber) json_error('Contact number is required.');
    if (!$address) json_error('Complete address is required.');

    $email = clean_str($b['email'] ?? '');
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        json_error('Email address is not valid.');
    }

    return [
        'customer_type' => $type,
        'full_name' => $fullName,
        'contact_person' => clean_str($b['contact_person'] ?? ''),
        'contact_number' => $contactNumber,
        'email' => $email,
        'address' => $address,
        'project_site' => clean_str($b['project_site'] ?? ''),
        'remarks' => clean_str($b['remarks'] ?? ''),
    ];
}
