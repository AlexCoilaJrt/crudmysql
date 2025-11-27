# User Attendance CRUD (PHP & MySQL)

This is a simple User Attendance CRUD (Create, Read, Update, Delete) application built with PHP and MySQL.

## Features
- **List Attendance**: View all attendance records.
- **Add Attendance**: Register a new user check-in.
- **Edit Attendance**: Update user details or add check-out time.
- **Delete Attendance**: Remove records.

## Requirements
- PHP
- MySQL

## Setup

1.  **Database**:
    You can import the `database.sql` file:
    ```bash
    mysql -u root -p < database.sql
    ```
    
    **Or create it manually:**
    Open your MySQL client (like phpMyAdmin or Workbench) and run:
    ```sql
    CREATE DATABASE attendance_db;
    USE attendance_db;

    CREATE TABLE attendance_records (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(100) NOT NULL,
        check_in DATETIME NOT NULL,
        check_out DATETIME,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

2.  **Configuration**:
    Edit `config.php` to match your database credentials (host, username, password, port).

3.  **Run**:
    Start a local PHP server:
    ```bash
    php -S localhost:8000
    ```
    Visit `http://localhost:8000` in your browser.

## License
MIT
