<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $mysqli->query("INSERT INTO employees (name, position, email, phone) VALUES ('$name', '$position', '$email', '$phone')");
    header("Location: employees.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/addemp_styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Employee</h2>
        <form action="add_emp.php" method="POST" class="form-container">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Position:</label>
            <input type="text" name="position" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Phone:</label>
            <input type="text" name="phone" required>
            <button type="submit" class="add-employee-btn">Add Employee</button>
        </form>
        <a href="employees.php" class="back-btn">Back</a>
    </div>
</body>
</html>