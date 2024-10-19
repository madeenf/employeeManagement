<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
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
    <link rel="stylesheet" href="css/dash_styles.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Employee Management System</h1>
            <a href="dashboard.php?logout=true" class="logout-btn">Logout</a>
        </header>

        <div class="cards-container">
            <div class="card">
                <h2>Manage Employees</h2>
                <p>View, add, update, or remove employee records.</p>
                <a href="employees.php" class="card-btn">Go to Employees</a>
            </div>

            <div class="card">
                <h2>Manage Users</h2>
                <p>Manage users who have access to the system.</p>
                <a href="users.php" class="card-btn">Go to Users</a>
            </div>
        </div>
    </div>
</body>
</html>