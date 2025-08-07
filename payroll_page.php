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
            $payrolls_results = mysqli_query($conn, $payrolls);

            if (mysqli_num_rows($payrolls_results) > 0) {
                while ($row = mysqli_fetch_assoc($payrolls_results)) {
                    echo "<div>";
                    echo "<h3>" . $row["name"]."</h3>".  
                         "<h5>" . $row["position"]."</h5>".
                         "<p>" . $row["hoursWorked"]."</p>" .
                         "<p>" . $row["leaveDeductions"]."</p>".
                         "<p>" . $row["finalSalary"]."</p>";
                    echo "</div>";
                    echo "<br>";
                }
            } else {
                echo "No payrolls found.";
            }
        ?>
    </div>
</body>
</html>