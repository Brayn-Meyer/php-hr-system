<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="components/style.css">
</head>
<body>
    <?php  
        include "components/sidebar.php";
        include "backend/database.php";
    ?>
    <div class="content">
    <h1>ATTENDANCE PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $attendance = "SELECT employeeInformation.name, employeeInformation.department, attendancerecords.date, attendancerecords.status FROM employeeInformation INNER JOIN attendancerecords ON employeeInformation.employeeId = attendancerecords.employeeId";
            $stmt = $pdo->query($attendance);

            echo "<table>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr> ";
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Generate initials from name
                    $nameParts = explode(" ", $row["name"]);
                    $initials = "";
                    foreach ($nameParts as $part) {
                        $initials .= strtoupper(substr($part, 0, 1));
                    }
                    echo "<tr>";
                    echo    "<td class='intial-td'><div class='initial-badge'>" . htmlspecialchars($initials) . "</div></td>" .
                            "<td>" . htmlspecialchars($row["name"]) . "</td>" .  
                            "<td>" . $row["department"]."</td>".
                            "<td>" . $row["date"]."</td>" .
                            "<td>" . $row["status"]."</td>";
                    echo "<tr>";
                }
            } else {
                echo "No attendance records found.";
            }
        ?>
    </div>
</body>
</html>