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
    <h1>LEAVE REQUEST PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $leave = "SELECT employeeInformation.name, employeeInformation.department, leaverequests.date, leaverequests.reason, leaverequests.status FROM employeeInformation INNER JOIN leaverequests ON employeeInformation.employeeId = leaverequests.employeeId";
            $leave_results = mysqli_query($conn, $leave);

            echo "<table border='1px'>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr> ";
            
            if (mysqli_num_rows($leave_results) > 0) {
                while ($row = mysqli_fetch_assoc($leave_results)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["department"]."</td>".
                         "<td>" . $row["date"]."</td>" .
                         "<td>" . $row["reason"]."</td>" .
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