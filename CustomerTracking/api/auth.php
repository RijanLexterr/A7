<?php
require_once __DIR__ . '/db.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

if ($method === 'POST' && $action === 'login') {
    $body = get_json_body();
    $username = clean_str($body['username'] ?? '');
    $password = (string) ($body['password'] ?? '');

    if (!$username || !$password) {
        json_error('Username and password are required.');
    }

    $stmt = db()->prepare('SELECT id, username, password_hash, full_name FROM users WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        json_error('Invalid username or password.', 401);
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];

    json_success([
        'id' => $user['id'],
        'username' => $user['username'],
        'full_name' => $user['full_name'],
    ]);
}

if ($method === 'POST' && $action === 'logout') {
    $_SESSION = [];
    session_destroy();
    json_success(['message' => 'Logged out.']);
}

if ($method === 'GET' && $action === 'check') {
    if (empty($_SESSION['user_id'])) {
        json_error('Not authenticated.', 401);
    }
    json_success([
        'id' => $_SESSION['user_id'],
        'username' => $_SESSION['username'],
        'full_name' => $_SESSION['full_name'],
    ]);
}

if ($method === 'POST' && $action === 'forgot') {
    $body = get_json_body();
    $identifier = clean_str($body['identifier'] ?? '');

    // Always respond the same way whether or not we found an account,
    // so this endpoint can't be used to check which usernames/emails exist.
    $genericMessage = 'If an account matches, a password reset link has been sent to its registered email address.';

    if (!$identifier) {
        json_success(['message' => $genericMessage]);
    }

    $stmt = db()->prepare('SELECT id, full_name, email FROM users WHERE username = ? OR email = ? LIMIT 1');
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch();

    if ($user && !empty($user['email'])) {
        $rawToken = bin2hex(random_bytes(32));
        $tokenHash = hash('sha256', $rawToken);
        $expires = date('Y-m-d H:i:s', time() + 3600); // 1 hour

        $upd = db()->prepare('UPDATE users SET reset_token_hash = ?, reset_token_expires = ? WHERE id = ?');
        $upd->execute([$tokenHash, $expires, $user['id']]);

        $resetLink = rtrim(SITE_URL, '/') . '/#!/reset-password?token=' . $rawToken;

        $subject = 'HMCF Prime - Password Reset Request';
        $body2 = "Hi {$user['full_name']},\r\n\r\n"
            . "We received a request to reset your HMCF Prime Operations password.\r\n\r\n"
            . "Reset your password using this link (valid for 1 hour):\r\n{$resetLink}\r\n\r\n"
            . "If you didn't request this, you can safely ignore this email.\r\n";

        $headers = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n"
            . "Content-Type: text/plain; charset=utf-8\r\n";

        // NOTE: PHP's mail() works on most Hostinger plans out of the box, but for
        // reliable delivery (avoiding spam folders) consider switching this to
        // PHPMailer with SMTP credentials from hPanel -> Emails.
        @mail($user['email'], $subject, $body2, $headers);
    }

    json_success(['message' => $genericMessage]);
}

if ($method === 'POST' && $action === 'reset') {
    $body = get_json_body();
    $token = clean_str($body['token'] ?? '');
    $password = (string) ($body['password'] ?? '');

    if (!$token || strlen($password) < 6) {
        json_error('Please provide a valid link and a password of at least 6 characters.');
    }

    $tokenHash = hash('sha256', $token);
    $stmt = db()->prepare('SELECT id FROM users WHERE reset_token_hash = ? AND reset_token_expires > NOW() LIMIT 1');
    $stmt->execute([$tokenHash]);
    $user = $stmt->fetch();

    if (!$user) {
        json_error('This reset link is invalid or has expired. Please request a new one.', 400);
    }

    $newHash = password_hash($password, PASSWORD_DEFAULT);
    $upd = db()->prepare('UPDATE users SET password_hash = ?, reset_token_hash = NULL, reset_token_expires = NULL WHERE id = ?');
    $upd->execute([$newHash, $user['id']]);

    json_success(['message' => 'Your password has been reset. You can now log in.']);
}

json_error('Unknown action.', 404);
