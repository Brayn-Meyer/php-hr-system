<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']); // sanitize input

        $stmt = $pdo->prepare("DELETE FROM performancereviews WHERE employeeId = ?");
        $stmt->execute([$id]);

        $stmt = $pdo->prepare("DELETE FROM payrolldata WHERE employeeId = ?");
        $stmt->execute([$id]);

        $stmt = $pdo->prepare("DELETE FROM leaverequests WHERE employeeId = ?");
        $stmt->execute([$id]);

        $stmt = $pdo->prepare("DELETE FROM attendancerecords WHERE employeeId = ?");
        $stmt->execute([$id]);
        
        $stmt = $pdo->prepare("DELETE FROM employeeinformation WHERE employeeId = ?");
        $stmt->execute([$id]);

        // Redirect back after delete
        header("Location: employee_page.php");
        exit();
    }
?>