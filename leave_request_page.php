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
    <button class="toggle_add_leave">Add Leave Request</button>
    <br>
    <br>
    <div>
        <form class="create_leave_form" action="create_employee.php" method="post" style="display: none;">
            <label for="l_name">Name : </label>
            <select name="l_name">
                <?php
                    $employees = "SELECT name, department FROM employeeInformation";
                    $stmt = $pdo->query($employees);

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo    "<option> "
                                        . $row["name"] .
                                    "</option>";
                        }
                    }

                    echo "</select>
                            <br>
                            <label for='l_department'>Department : </label>
                            <input name='l_department' type='readonly' value='$row[department]'>";
                ?>
            
            <br>
            <label for="l_date">Salary : </label>
            <input name="l_date" type="date">
            <br>
            <label for="l_reason">Department : </label>
            <input name="l_reason" type="text">
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <?php
            echo "<br>";

            $leave = "SELECT employeeInformation.name, employeeInformation.department, leaverequests.date, leaverequests.reason, leaverequests.status FROM employeeInformation INNER JOIN leaverequests ON employeeInformation.employeeId = leaverequests.employeeId";
            $stmt = $pdo->query($leave);

            echo "<table>
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
                echo "No leave request found.";
            }
        ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleBtn = document.querySelector(".toggle_add_leave");
        const form = document.querySelector(".create_leave_form");

        toggleBtn.addEventListener("click", () => {
            form.style.display = form.style.display === "none" ? "block" : "none";
        });
    });
</script>
</html>