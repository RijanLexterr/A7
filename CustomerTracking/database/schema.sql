-- ============================================================
-- HMCF Prime Corporation - Customer & Truck Assignment System
-- Database Schema for MySQL (Hostinger compatible, InnoDB/utf8mb4)
-- ============================================================

CREATE DATABASE IF NOT EXISTS hmcf_prime CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hmcf_prime;

-- ------------------------------------------------------------
-- Table: users  (staff/admin login)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NULL UNIQUE,
    reset_token_hash VARCHAR(64) NULL,
    reset_token_expires DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Default admin account -> username: admin / password: admin123
-- (bcrypt hash, verified against 'admin123' — see api/reset_password.php if you need
-- to generate a new one later)
-- CHANGE THIS PASSWORD IMMEDIATELY AFTER FIRST LOGIN.
INSERT INTO users (username, password_hash, full_name)
VALUES ('admin', '$2y$10$GenCIteHGU0PRnuiYmSLRupv2iazigeXqX5V3oR/IB7Uwux7KZNAK', 'HMCF Prime Admin')
ON DUPLICATE KEY UPDATE username = username;

-- ------------------------------------------------------------
-- Table: customers
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_type ENUM('Individual','Company') NOT NULL DEFAULT 'Individual',
    full_name VARCHAR(150) NOT NULL,
    contact_person VARCHAR(150) DEFAULT NULL,
    contact_number VARCHAR(50) NOT NULL,
    email VARCHAR(150) DEFAULT NULL,
    address TEXT NOT NULL,
    project_site TEXT DEFAULT NULL,
    remarks TEXT DEFAULT NULL,
    is_archived TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_customer_name (full_name),
    INDEX idx_customer_contact (contact_number)
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Table: trucks  (fleet / equipment list)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS trucks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plate_number VARCHAR(50) NOT NULL UNIQUE,
    truck_type VARCHAR(100) NOT NULL,
    capacity VARCHAR(50) DEFAULT NULL,
    status ENUM('Available','Assigned','Under Maintenance') NOT NULL DEFAULT 'Available',
    is_archived TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Table: assignments  (truck assignment / receipt records)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    receipt_no VARCHAR(50) NOT NULL UNIQUE,
    customer_id INT NOT NULL,
    truck_id INT NOT NULL,
    driver_name VARCHAR(150) NOT NULL,
    service_type ENUM('Hauling','Equipment Rental','Site Preparation') NOT NULL DEFAULT 'Hauling',
    pickup_location VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    duration VARCHAR(100) DEFAULT NULL,
    amount DECIMAL(10,2) DEFAULT NULL,
    status ENUM('Pending','Ongoing','Completed') NOT NULL DEFAULT 'Pending',
    remarks TEXT DEFAULT NULL,
    date_assigned DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_assignment_customer FOREIGN KEY (customer_id) REFERENCES customers(id),
    CONSTRAINT fk_assignment_truck FOREIGN KEY (truck_id) REFERENCES trucks(id),
    INDEX idx_receipt_no (receipt_no),
    INDEX idx_date_assigned (date_assigned)
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Sample seed data (optional - safe to delete)
-- ------------------------------------------------------------
INSERT INTO trucks (plate_number, truck_type, capacity, status) VALUES
('ABC 1234', 'Dump Truck', '10 wheeler', 'Available'),
('XYZ 5678', 'Backhoe', 'Standard', 'Available'),
('DEF 9012', 'Dump Truck', '6 wheeler', 'Available');
