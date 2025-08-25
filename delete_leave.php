<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']); // sanitize input

        $stmt = $pdo->prepare("DELETE FROM leaverequests WHERE id = ?");
        $stmt->execute([$id]);

        // Redirect back after delete
        header("Location: leave_request_page.php");
        exit();
    }
?>