-- Drop database if it already exists
DROP DATABASE IF EXISTS Service;

-- Create database
CREATE DATABASE Service;

-- Use the database
USE Service;

-- Create Request table
CREATE TABLE
    Request (
        id INT AUTO_INCREMENT PRIMARY KEY,
        equipment_needed ENUM ('Bulldozer', 'Dump Truck', 'Road Roller / Pison') NOT NULL,
        project_location VARCHAR(255) NOT NULL,
        start_date DATE NOT NULL,
        end_date DATE NOT NULL,
        full_name VARCHAR(150) NOT NULL,
        contact_number VARCHAR(20) NOT NULL,
        email_address VARCHAR(150) NOT NULL,
        additional_notes TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       
    );