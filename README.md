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
    Import the `database.sql` file into your MySQL server.
    ```bash
    mysql -u root -p < database.sql
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
