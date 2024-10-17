<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/emp_styles.css">
</head>
<body>
    <h1>Welcome to the Employee Management System</h1>
    <nav>
        <ul>
            <li><a href="employees.php">Manage Employees</a></li>
            <li><a href="users.php">Manage Users</a></li>
        </ul>
    </nav>
</body>
</html>