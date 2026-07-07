<?php
require_once __DIR__ . '/db.php';
require_login();

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = db()->prepare('SELECT * FROM trucks WHERE id = ? AND is_archived = 0');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) json_error('Truck not found.', 404);
            json_success($row);
        }

        // available_only=1 -> used by the assignment form dropdown
        $availableOnly = isset($_GET['available_only']) && $_GET['available_only'] == '1';
        $where = 'WHERE is_archived = 0';
        if ($availableOnly) {
            $where .= " AND status = 'Available'";
        }
        $stmt = db()->query("SELECT * FROM trucks $where ORDER BY plate_number ASC");
        json_success($stmt->fetchAll());
        break;

    case 'POST':
        $b = get_json_body();
        $data = validate_truck($b);

        $stmt = db()->prepare('INSERT INTO trucks (plate_number, truck_type, capacity, status) VALUES (?,?,?,?)');
        $stmt->execute([$data['plate_number'], $data['truck_type'], $data['capacity'], $data['status']]);

        json_success(['id' => (int) db()->lastInsertId()], 201);
        break;

    case 'PUT':
        if (!$id) json_error('Missing truck id.');
        $b = get_json_body();
        $data = validate_truck($b);

        $stmt = db()->prepare('UPDATE trucks SET plate_number = ?, truck_type = ?, capacity = ?, status = ? WHERE id = ?');
        $stmt->execute([$data['plate_number'], $data['truck_type'], $data['capacity'], $data['status'], $id]);

        json_success(['id' => $id]);
        break;

    case 'DELETE':
        if (!$id) json_error('Missing truck id.');
        $stmt = db()->prepare('UPDATE trucks SET is_archived = 1 WHERE id = ?');
        $stmt->execute([$id]);
        json_success(['id' => $id, 'archived' => true]);
        break;

    default:
        json_error('Method not allowed.', 405);
}

function validate_truck(array $b): array
{
    $plate = clean_str($b['plate_number'] ?? '');
    $type = clean_str($b['truck_type'] ?? '');
    $status = clean_str($b['status'] ?? 'Available');

    if (!$plate) json_error('Plate number is required.');
    if (!$type) json_error('Truck/equipment type is required.');
    if (!in_array($status, ['Available', 'Assigned', 'Under Maintenance'], true)) {
        json_error('Invalid truck status.');
    }

    return [
        'plate_number' => $plate,
        'truck_type' => $type,
        'capacity' => clean_str($b['capacity'] ?? ''),
        'status' => $status,
    ];
}
