<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $mysqli->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="css/addemp_styles.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Add New User</h2>
        <form action="add_user.php" method="POST" class="form-container">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Role:</label>
            <input type="text" name="role" required>

            <button type="submit" class="add-employee-btn">Add User</button>
        </form>
        <a href="users.php" class="back-btn">Back</a>
    </div>
</body>
</html>