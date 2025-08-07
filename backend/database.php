<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "Sql15B4d#00";
    $db_name = "moderntech_solutions";
    $conn = "";

    try {
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    } catch (mysqli_sql_exception) {
        echo "Database was not connected <br>";
    }

    if ($conn) {
        // echo "Database is connected <br>";
    }
?>