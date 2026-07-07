-- ============================================================
-- Migration v2 - run this ONCE if you already deployed the app
-- before "Add User" and "Forgot Password" existed.
-- Safe to run in phpMyAdmin -> your database -> SQL tab.
-- (If you're installing fresh, just use database/schema.sql instead —
-- it already includes these columns.)
-- ============================================================

ALTER TABLE users
    ADD COLUMN email VARCHAR(150) NULL UNIQUE,
    ADD COLUMN reset_token_hash VARCHAR(64) NULL,
    ADD COLUMN reset_token_expires DATETIME NULL;
