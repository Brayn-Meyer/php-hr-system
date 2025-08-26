<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id'] ?? 0);

        $stmt = $pdo->prepare("UPDATE payrolldata SET hoursWorked = ?, leaveDeductions = ?, finalSalary = ? WHERE id = ?");
        $stmt->execute([
            $_POST['hoursWorked'] ?? null,
            $_POST['leaveDeductions'] ?? null,
            $_POST['finalSalary'] ?? null,
            $id
        ]);

        // Redirect back after update
        header("Location: payroll_page.php");
        exit();
    }
?>