<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
$mysqli = new mysqli("localhost", "root", "", "employee_mgmt");
$id = $_GET['id'];
$mysqli->query("DELETE FROM employees WHERE id=$id");
header("Location: employees.php");
?>