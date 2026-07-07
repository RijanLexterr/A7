<?php
require_once __DIR__ . '/db.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    json_error('Method not allowed.', 405);
}

$pdo = db();

$totalCustomers = (int) $pdo->query("SELECT COUNT(*) AS n FROM customers WHERE is_archived = 0")->fetch()['n'];

$truckStats = $pdo->query("
    SELECT status, COUNT(*) AS n
    FROM trucks
    WHERE is_archived = 0
    GROUP BY status
")->fetchAll();
$trucks = ['Available' => 0, 'Assigned' => 0, 'Under Maintenance' => 0];
foreach ($truckStats as $row) {
    $trucks[$row['status']] = (int) $row['n'];
}
$totalTrucks = array_sum($trucks);

$assignmentStats = $pdo->query("
    SELECT status, COUNT(*) AS n
    FROM assignments
    GROUP BY status
")->fetchAll();
$assignments = ['Pending' => 0, 'Ongoing' => 0, 'Completed' => 0];
foreach ($assignmentStats as $row) {
    $assignments[$row['status']] = (int) $row['n'];
}
$totalAssignments = array_sum($assignments);

$todayCount = (int) $pdo->query("
    SELECT COUNT(*) AS n FROM assignments WHERE date_assigned = CURDATE()
")->fetch()['n'];

$monthRevenue = $pdo->query("
    SELECT COALESCE(SUM(amount), 0) AS total
    FROM assignments
    WHERE amount IS NOT NULL
      AND YEAR(date_assigned) = YEAR(CURDATE())
      AND MONTH(date_assigned) = MONTH(CURDATE())
")->fetch()['total'];

$recentStmt = $pdo->query("
    SELECT
        a.id, a.receipt_no, a.date_assigned, a.service_type, a.status, a.amount,
        c.full_name AS customer_name,
        t.plate_number, t.truck_type
    FROM assignments a
    JOIN customers c ON c.id = a.customer_id
    JOIN trucks t ON t.id = a.truck_id
    ORDER BY a.created_at DESC
    LIMIT 8
");
$recent = $recentStmt->fetchAll();

json_success([
    'total_customers' => $totalCustomers,
    'trucks' => [
        'total' => $totalTrucks,
        'available' => $trucks['Available'],
        'assigned' => $trucks['Assigned'],
        'maintenance' => $trucks['Under Maintenance'],
    ],
    'assignments' => [
        'total' => $totalAssignments,
        'pending' => $assignments['Pending'],
        'ongoing' => $assignments['Ongoing'],
        'completed' => $assignments['Completed'],
        'today' => $todayCount,
    ],
    'month_revenue' => (float) $monthRevenue,
    'recent_assignments' => $recent,
]);
