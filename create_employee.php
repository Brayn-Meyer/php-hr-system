<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Save employee data from POST to session
        $_SESSION['create_employee'] = [
            'employee_name' => $_POST['employee_name'] ?? null,
            'employee_position' => $_POST['employee_position'] ?? null,
            'employee_department' => $_POST['employee_department'] ?? null,
            'employee_salary' => $_POST['employee_salary'] ?? null,
            'employee_employment_history' => $_POST['employee_employment_history'] ?? null,
            'employee_contact' => $_POST['employee_contact'] ?? null,
        ];

        // After processing, redirect to confirmation page
        header("Location: create_employee_confirm.php");
        exit;
    } else {
        // If accessed directly, redirect back to booking form
        header("Location: employee_page.php");
        exit;
    }
?>