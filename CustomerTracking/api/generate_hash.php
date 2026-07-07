<?php
/**
 * ONE-TIME UTILITY - generate a bcrypt password hash to paste into the
 * `users` table (column: password_hash) via phpMyAdmin.
 *
 * HOW TO USE:
 *   1. Upload this file to the server (it's already in /api if you kept it).
 *   2. Visit:  https://yourapp-domain/api/generate_hash.php?password=YourNewPassword
 *   3. Copy the resulting hash into phpMyAdmin:
 *        UPDATE users SET password_hash = 'PASTE_HASH_HERE' WHERE username = 'admin';
 *   4. DELETE THIS FILE from the server afterward — it should never stay live,
 *      since anyone who finds the URL could generate hashes too.
 */

header('Content-Type: text/plain; charset=utf-8');

$password = $_GET['password'] ?? '';

if ($password === '') {
    echo "Usage: generate_hash.php?password=YourNewPassword\n";
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: $password\n";
echo "Hash:     $hash\n\n";
echo "Run this in phpMyAdmin (SQL tab):\n";
echo "UPDATE users SET password_hash = '$hash' WHERE username = 'admin';\n\n";
echo "Then DELETE this file (generate_hash.php) from your server.\n";
