<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM employees WHERE id=$id");
$employee = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $mysqli->query("UPDATE employees SET name='$name', position='$position', email='$email', phone='$phone' WHERE id=$id");
    header("Location: employees.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="css/addemp_styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <form action="edit_emp.php?id=<?php echo $employee['id']; ?>" method="POST" class="form-container">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $employee['name']; ?>" required>
            <label>Position:</label>
            <input type="text" name="position" value="<?php echo $employee['position']; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $employee['email']; ?>" required>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $employee['phone']; ?>" required>
            <button type="submit" class="update-employee-btn">Update Employee</button>
        </form>
        <a href="employees.php" class="back-btn">Back</a>
    </div>
</body>
</html>