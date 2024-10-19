<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");

$result = $mysqli->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/emp_styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h2>Manage Users</h2>
            <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
        </header>

        <div class="table-container">
            <a href="add_user.php" class="add-employee-btn">Add New User</a>
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['role']; ?></td>
                        <td class="actions">
                            <a href="edit_user.php?id=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                            <a href="delete_user.php?id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>