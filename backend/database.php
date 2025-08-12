<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "Sql15B4d#00";
    $db_name = "moderntech_solutions";
    $conn = "";

    try {
        $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Could not connect to the database: " . $e->getMessage());
    }
?>