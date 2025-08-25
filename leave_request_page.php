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
        <form class="create_leave_form" action="create_leave.php" method="post" style="display: none;">
            <label for="leave_name">Name : </label>
            <select name="leave_name" id="leave_name_select" require>
                <option readonly >Select an Employee</option>
                <?php
                    $employees = "SELECT name, department FROM employeeInformation";
                    $stmt = $pdo->query($employees);

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . htmlspecialchars($row["name"]) . "' data-department='" . htmlspecialchars($row["department"]) . "'>"
                                    . htmlspecialchars($row["name"]) .
                                "</option>";
                        }
                    }
                ?>
            </select>
            <br>
            <label for='leave_department'>Department : </label>
            <input id="leave_department" name='leave_department' type='text' readonly>
            <br>
            <label for="leave_date">Date : </label>
            <input name="leave_date" type="date" require>
            <br>
            <label for="leave_reason">Reason : </label>
            <input name="leave_reason" type="text" require>
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <?php
            echo "<br>";

            $leave = "SELECT employeeInformation.name, employeeInformation.department, leaverequests.id, leaverequests.date, leaverequests.reason, leaverequests.status FROM employeeInformation INNER JOIN leaverequests ON employeeInformation.employeeId = leaverequests.employeeId";
            $stmt = $pdo->query($leave);

            echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr> ";
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>" .
                        "<td>" . htmlspecialchars($row["department"]) . "</td>" .
                        "<td>" . htmlspecialchars($row["date"]) . "</td>" .
                        "<td>" . htmlspecialchars($row["reason"]) . "</td>" .
                        "<td>" . htmlspecialchars($row["status"]) . "</td>" .
                        "<td>";

                    if ($row["status"] == "Pending") {
                        echo "<form action='edit_leave_status.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <input type='hidden' name='status' value='Approved'>
                                <button type='submit'>Approve</button>
                            </form>
                            <form action='edit_leave_status.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <input type='hidden' name='status' value='Denied'>
                                <button type='submit'>Deny</button>
                            </form>";
                    } else {
                        echo "<form action='edit_leave.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <input type='hidden' name='name' value='" . $row["name"] . "'>
                                <input type='hidden' name='date' value='" . $row["date"] . "'>
                                <input type='hidden' name='reason' value='" . $row["reason"] . "'>
                                <input type='hidden' name='status' value='" . $row["status"] . "'>
                                <button type='submit'>Edit</button>
                            </form>
                            <form action='delete_leave.php' method='post' 
                                onsubmit=\"return confirm('Are you sure you want to delete this record?');\" style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit'>Delete</button>
                            </form>";
                    }
                    echo "</td>";
                    echo "</tr>";
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

        const nameSelect = document.getElementById("leave_name_select");
        const departmentInput = document.getElementById("leave_department");

        nameSelect.addEventListener("change", () => {
            const selectedOption = nameSelect.options[nameSelect.selectedIndex];
            departmentInput.value = selectedOption.getAttribute("data-department");
        });
    });
</script>
</html>