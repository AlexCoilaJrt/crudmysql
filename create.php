<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $check_in = $_POST['check_in'];

    $stmt = $pdo->prepare("INSERT INTO attendance_records (user_name, check_in) VALUES (?, ?)");
    $stmt->execute([$user_name, $check_in]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Attendance</h2>
        <form method="POST">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="user_name" required>
            </div>
            <div class="form-group">
                <label>Check In Time</label>
                <input type="datetime-local" name="check_in" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" class="btn">Cancel</a>
        </form>
    </div>
</body>
</html>
