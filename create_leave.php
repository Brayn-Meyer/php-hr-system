<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Save employee data from POST to session
        $_SESSION['create_leave'] = [
            'leave_name' => $_POST['leave_name'] ?? null,
            'leave_department' => $_POST['leave_department'] ?? null,
            'leave_date' => $_POST['leave_date'] ?? null,
            'leave_reason' => $_POST['leave_reason'] ?? null
        ];

        // After processing, redirect to confirmation page
        header("Location: create_leave_confirm.php");
        exit;
    } else {
        // If accessed directly, redirect back to booking form
        header("Location: leave_request_page.php");
        exit;
    }
?>