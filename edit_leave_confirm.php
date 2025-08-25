<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id'] ?? 0);

        $stmt = $pdo->prepare("UPDATE leaverequests SET date = ?, reason = ?, status = ? WHERE id = ?");
        $stmt->execute([
            $_POST['date'] ?? null,
            $_POST['reason'] ?? null,
            $_POST['status'] ?? null,
            $id
        ]);

        // Redirect back after update
        header("Location: leave_request_page.php");
        exit();
    }
?>