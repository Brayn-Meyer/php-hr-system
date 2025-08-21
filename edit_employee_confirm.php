<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $name = $_POST['name'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $salary = floatval($_POST['salary']);
        $employmentHistory = $_POST['employmentHistory'];
        $contact = $_POST['contact'];

        $stmt = $pdo->prepare("UPDATE employeeinformation SET name = ?, position = ?, department = ?, salary = ?, employmentHistory = ?, contact = ? WHERE employeeId = ?");
        $stmt->execute([$name, $position, $department, $salary, $employmentHistory, $contact, $id]);

        // Redirect back after delete
        header("Location: employee_page.php");
        exit();
    }
?>