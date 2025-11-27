CREATE DATABASE IF NOT EXISTS attendance_db;
USE attendance_db;

CREATE TABLE IF NOT EXISTS attendance_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    check_in DATETIME NOT NULL,
    check_out DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
