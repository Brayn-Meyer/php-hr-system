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
    <h1>PAYROLL PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $payrolls = "SELECT employeeInformation.name, employeeInformation.position, payrolldata.hoursWorked, payrolldata.leaveDeductions, payrolldata.finalSalary FROM employeeInformation INNER JOIN payrolldata ON employeeInformation.employeeId = payrolldata.employeeId";
            $stmt = $pdo->query($payrolls);

            echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Hours Worked</th>
                    <th>Leave Days Taken</th>
                    <th>Final Salary</th>
                </tr> ";
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["position"]."</td>".
                         "<td>" . $row["hoursWorked"]."</td>" .
                         "<td>" . $row["leaveDeductions"]."</td>".
                         "<td>" . $row["finalSalary"]."</td>";
                    echo "<tr>";
                }
            } else {
                echo "No payrolls found.";
            }
        ?>
    </div>
</body>
</html>