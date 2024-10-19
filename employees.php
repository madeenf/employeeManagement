<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");
$result = $mysqli->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="css/emp_styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h2>Employee List</h2>
            <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
        </header>

        <div class="table-container">
            <a href="add_emp.php" class="add-employee-btn">Add New Employee</a>
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['position']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td class="actions">
                            <a href="edit_emp.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                            <a href="delete_emp.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>