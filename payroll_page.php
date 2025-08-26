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
    <h1>PAYROLL PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $payrolls = "SELECT employeeInformation.name, employeeInformation.position, employeeinformation.salary, payrolldata.id, payrolldata.hoursWorked, payrolldata.leaveDeductions, payrolldata.finalSalary FROM employeeInformation INNER JOIN payrolldata ON employeeInformation.employeeId = payrolldata.employeeId";
            $stmt = $pdo->query($payrolls);

            echo "<table>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Hours Worked</th>
                    <th>Leave Days Taken</th>
                    <th>Final Salary</th>
                    <th>Actions</th>
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
                        echo "<td class='intial-td'><div class='initial-badge'>" . htmlspecialchars($initials) . "</div></td>" .
                            "<td>" . htmlspecialchars($row["name"]) . "</td>" .  
                            "<td>" . $row["position"]."</td>".
                            "<td>" . $row["hoursWorked"]."</td>" .
                            "<td>" . $row["leaveDeductions"]."</td>".
                            "<td>" . $row["finalSalary"]."</td>" .
                            "<td>
                                <form action='edit_payroll.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                                    <input type='hidden' name='name' value='" . $row["name"] . "'>
                                    <input type='hidden' name='salary' value='" . $row["salary"] . "'>
                                    <input type='hidden' name='hoursWorked' value='" . $row["hoursWorked"] . "'>
                                    <input type='hidden' name='leaveDeductions' value='" . $row["leaveDeductions"] . "'>
                                    <button type='submit'>Edit</button>
                                </form>
                            </td>";
                    echo "<tr>";
                }
            } else {
                echo "No payrolls found.";
            }
        ?>
    </div>
</body>
</html>