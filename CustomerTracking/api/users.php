<?php
require_once __DIR__ . '/db.php';
require_login();

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = db()->prepare('SELECT id, username, full_name, email, created_at FROM users WHERE id = ?');
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            if (!$row) json_error('User not found.', 404);
            json_success($row);
        }

        $stmt = db()->query('SELECT id, username, full_name, email, created_at FROM users ORDER BY full_name ASC');
        json_success($stmt->fetchAll());
        break;

    case 'POST':
        $b = get_json_body();
        $username = clean_str($b['username'] ?? '');
        $fullName = clean_str($b['full_name'] ?? '');
        $email = clean_str($b['email'] ?? '');
        $password = (string) ($b['password'] ?? '');

        if (!$username) json_error('Username is required.');
        if (!$fullName) json_error('Full name is required.');
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) json_error('Email address is not valid.');
        if (strlen($password) < 6) json_error('Password must be at least 6 characters.');

        $dupe = db()->prepare('SELECT id FROM users WHERE username = ?');
        $dupe->execute([$username]);
        if ($dupe->fetch()) json_error('That username is already taken.');

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = db()->prepare('INSERT INTO users (username, password_hash, full_name, email) VALUES (?,?,?,?)');
        $stmt->execute([$username, $hash, $fullName, $email]);

        json_success(['id' => (int) db()->lastInsertId()], 201);
        break;

    case 'PUT':
        if (!$id) json_error('Missing user id.');
        $b = get_json_body();
        $username = clean_str($b['username'] ?? '');
        $fullName = clean_str($b['full_name'] ?? '');
        $email = clean_str($b['email'] ?? '');
        $password = (string) ($b['password'] ?? '');

        if (!$username) json_error('Username is required.');
        if (!$fullName) json_error('Full name is required.');
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) json_error('Email address is not valid.');
        if ($password !== '' && strlen($password) < 6) json_error('Password must be at least 6 characters.');

        $dupe = db()->prepare('SELECT id FROM users WHERE username = ? AND id != ?');
        $dupe->execute([$username, $id]);
        if ($dupe->fetch()) json_error('That username is already taken.');

        if ($password !== '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = db()->prepare('UPDATE users SET username = ?, full_name = ?, email = ?, password_hash = ? WHERE id = ?');
            $stmt->execute([$username, $fullName, $email, $hash, $id]);
        } else {
            $stmt = db()->prepare('UPDATE users SET username = ?, full_name = ?, email = ? WHERE id = ?');
            $stmt->execute([$username, $fullName, $email, $id]);
        }

        json_success(['id' => $id]);
        break;

    case 'DELETE':
        if (!$id) json_error('Missing user id.');
        if ($id === (int) $_SESSION['user_id']) {
            json_error('You cannot remove your own account while logged in as it.');
        }
        $countStmt = db()->query('SELECT COUNT(*) AS n FROM users');
        if ((int) $countStmt->fetch()['n'] <= 1) {
            json_error('At least one staff account must remain.');
        }
        $stmt = db()->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
        json_success(['id' => $id, 'deleted' => true]);
        break;

    default:
        json_error('Method not allowed.', 405);
}
