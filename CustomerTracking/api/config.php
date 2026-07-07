<?php
/**
 * HMCF Prime - Database Configuration
 * ------------------------------------
 * Update these 4 values with the credentials from your Hostinger
 * hPanel -> Databases -> MySQL Databases screen.
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'hmcf_prime');   // replace with your actual DB name
define('DB_USER', 'root');    // replace with your actual DB user
define('DB_PASS', '');               // replace with your actual DB password

// Session lifetime in seconds (8 hours)
define('SESSION_LIFETIME', 8 * 60 * 60);

// Full base URL of this app (no trailing slash) - used to build the password
// reset link that gets emailed. Update this to match where you deployed it.
define('SITE_URL', 'https://app.hmcfprime.online');

// "From" address for password reset emails. On Hostinger this should be a
// real mailbox on your domain (hPanel -> Emails) for best deliverability.
define('MAIL_FROM', 'no-reply@hmcfprime.online');
define('MAIL_FROM_NAME', 'HMCF Prime Operations');

// Timezone used for dates/receipt numbering
date_default_timezone_set('Asia/Manila');
