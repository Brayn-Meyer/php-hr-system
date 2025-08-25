<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'] ?? null;
        $id = intval($_POST['id'] ?? 0);

        if ($status && $id > 0) {
            $stmt = $pdo->prepare("UPDATE leaverequests SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
        }

        // Redirect back after update
        header("Location: leave_request_page.php");
        exit();
    }
?>
