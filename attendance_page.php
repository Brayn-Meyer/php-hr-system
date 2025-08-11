<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include "components/sidebar.php";
        include "backend/database.php";
    ?>
    <h1>ATTENDANCE PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $attendance = "SELECT employeeInformation.name, employeeInformation.department, attendancerecords.date, attendancerecords.status FROM employeeInformation INNER JOIN attendancerecords ON employeeInformation.employeeId = attendancerecords.employeeId";
            $attendance_results = mysqli_query($conn, $attendance);

            echo "<table border='1px'>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr> ";
            
            if (mysqli_num_rows($attendance_results) > 0) {
                while ($row = mysqli_fetch_assoc($attendance_results)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["department"]."</td>".
                         "<td>" . $row["date"]."</td>" .
                         "<td>" . $row["status"]."</td>";
                    echo "<tr>";
                }
            } else {
                echo "No payrolls found.";
            }
        ?>
    </div>
</body>
</html>