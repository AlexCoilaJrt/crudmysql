<?php
require 'config.php';

$records = [];
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM attendance_records ORDER BY created_at DESC");
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Attendance</h1>
        
        <?php if ($db_error): ?>
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <strong>Error:</strong> <?= htmlspecialchars($db_error) ?>
                <br>
                <small>Please ensure your MySQL server is running and the database 'attendance_db' exists.</small>
            </div>
        <?php endif; ?>

        <a href="create.php" class="btn btn-primary">Add New Record</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?= htmlspecialchars($record['id']) ?></td>
                    <td><?= htmlspecialchars($record['user_name']) ?></td>
                    <td><?= htmlspecialchars($record['check_in']) ?></td>
                    <td><?= htmlspecialchars($record['check_out'] ?? 'N/A') ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $record['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $record['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
