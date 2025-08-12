<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Save employee data from POST to session
        $_SESSION['employee'] = [
            'e_name' => $_POST['e_name'] ?? null,
            'e_position' => $_POST['e_position'] ?? null,
            'e_department' => $_POST['e_department'] ?? null,
            'e_salary' => $_POST['e_salary'] ?? null,
            'e_employment_history' => $_POST['e_employment_history'] ?? null,
            'e_contact' => $_POST['e_contact'] ?? null,
        ];

        // After processing, redirect to confirmation page
        header("Location: create_employee_confirm.php");
        exit;
    } else {
        // If accessed directly, redirect back to booking form
        header("Location: employee_pagephp");
        exit;
    }
?>