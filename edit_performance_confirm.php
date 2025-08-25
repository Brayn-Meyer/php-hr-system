<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id'] ?? 0);

        $stmt = $pdo->prepare("UPDATE performancereviews SET reviewDate = ?, rating = ?, strengths = ?, areasForImprovement = ?, goals = ?, status = ? WHERE id = ?");
        $stmt->execute([
            $_POST['reviewDate'] ?? null,
            $_POST['rating'] ?? null,
            $_POST['strengths'] ?? null,
            $_POST['areasForImprovement'] ?? null,
            $_POST['goals'] ?? null,
            $_POST['status'] ?? null,
            $id
        ]);

        // Redirect back after update
        header("Location: performance_page.php");
        exit();
    }
?>