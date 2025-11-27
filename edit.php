<?php
require 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM attendance_records WHERE id = ?");
$stmt->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$record) {
    die("Record not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'] ?: null;

    $stmt = $pdo->prepare("UPDATE attendance_records SET user_name = ?, check_in = ?, check_out = ? WHERE id = ?");
    $stmt->execute([$user_name, $check_in, $check_out, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Attendance</h2>
        <form method="POST">
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="user_name" value="<?= htmlspecialchars($record['user_name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Check In Time</label>
                <input type="datetime-local" name="check_in" value="<?= date('Y-m-d\TH:i', strtotime($record['check_in'])) ?>" required>
            </div>
            <div class="form-group">
                <label>Check Out Time</label>
                <input type="datetime-local" name="check_out" value="<?= $record['check_out'] ? date('Y-m-d\TH:i', strtotime($record['check_out'])) : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn">Cancel</a>
        </form>
    </div>
</body>
</html>
