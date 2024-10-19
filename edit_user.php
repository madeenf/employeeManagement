<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("UPDATE users SET username=?, password=?, role=? WHERE id=?");
        $stmt->bind_param("sssi", $username, $password, $role, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE users SET username=?, role=? WHERE id=?");
        $stmt->bind_param("ssi", $username, $role, $id);
    }
    
    $stmt->execute();
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css/addemp_styles.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?= $user['id']; ?>" method="POST" class="form-container">
            <label>Username:</label>
            <input type="text" name="username" value="<?= $user['username']; ?>" required>

            <label>Password (Leave blank to keep current password):</label>
            <input type="password" name="password">

            <label>Role:</label>
            <input type="text" name="role" value="<?= $user['role']; ?>" required>

            <button type="submit" class="update-employee-btn">Update User</button>
        </form>
        <a href="users.php" class="back-btn">Back</a>
    </div>
</body>
</html>