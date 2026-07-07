<?php
/**
 * HMCF Prime - Shared bootstrap for all API endpoints.
 * Handles: session start, DB connection (PDO), JSON helpers, basic CORS.
 */

require_once __DIR__ . '/config.php';

// ---- Session ----
ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
session_set_cookie_params(SESSION_LIFETIME);
session_start();

// ---- Headers ----
header('Content-Type: application/json; charset=utf-8');
// If the frontend is served from a different subdomain, uncomment and set explicitly:
// header('Access-Control-Allow-Origin: https://app.hmcfprime.online');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Headers: Content-Type');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ---- DB Connection (PDO) ----
function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            json_error('Database connection failed. Please check api/config.php.', 500);
        }
    }
    return $pdo;
}

// ---- JSON response helpers ----
function json_success($data = null, int $code = 200): void
{
    http_response_code($code);
    echo json_encode(['success' => true, 'data' => $data]);
    exit;
}

function json_error(string $message, int $code = 400): void
{
    http_response_code($code);
    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

function get_json_body(): array
{
    $raw = file_get_contents('php://input');
    if (!$raw) {
        return [];
    }
    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : [];
}

// ---- Auth guard ----
function require_login(): void
{
    if (empty($_SESSION['user_id'])) {
        json_error('Not authenticated. Please log in.', 401);
    }
}

// ---- Small helpers ----
function clean_str($val): ?string
{
    if ($val === null) return null;
    $val = trim((string) $val);
    return $val === '' ? null : $val;
}
