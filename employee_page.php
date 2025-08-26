<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="components/style.css">
    <style>
        .form-input {
            display: none;
            margin-top: 5px;
            width: 90%;
        }
        .editing .form-input {
            display: inline-block;
        }
        .editing .display-text {
            display: none;
        }
    </style>
</head>
<body>
    <?php  
        include "components/sidebar.php";
        include "backend/database.php";
    ?>
    <div class="content">
        <h1>EMPLOYEE PAGE</h1>
        <button class="toggle_add_employee">Add Employee</button>
        <br><br>
        <div>
            <form class="create_employee_form" action="create_employee.php" method="post" style="display: none;">
                <label for="e_name">Name : </label>
                <input name="e_name" type="text"><br>
                <label for="e_position">Position : </label>
                <input name="e_position" type="text"><br>
                <label for="e_department">Department : </label>
                <input name="e_department" type="text"><br>
                <label for="e_salary">Salary : </label>
                <input name="e_salary" type="number"><br>
                <label for="e_employment_history">Employment History : </label>
                <input name="e_employment_history" type="text"><br>
                <label for="e_contact">Contact : </label>
                <input name="e_contact" type="text"><br><br>
                <button type="submit">Submit</button>
            </form>

            <?php
                echo "<br>";

                $employees = "SELECT * FROM employeeinformation";
                $stmt = $pdo->query($employees);

                echo "<table>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Employment History</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>";

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $nameParts = explode(" ", $row["name"]);
                        $initials = "";
                        foreach ($nameParts as $part) {
                            $initials .= strtoupper(substr($part, 0, 1));
                        }

                        echo "<form method='POST' action='edit_employee_confirm.php'><tr>";
                        echo "<td class='intial-td'><div class='initial-badge'>" . htmlspecialchars($initials) . "</div></td>";
                        echo "<input type='hidden' name='id' value='" . $row['employeeId'] . "'>";

                        echo "<td><span class='display-text'>" . $row["name"] . "</span>
                                <input class='form-input' type='text' name='name' value='" . $row['name'] . "'></td>";

                        echo "<td><span class='display-text'>" . $row["position"] . "</span>
                                <input class='form-input' type='text' name='position' value='" . $row['position'] . "'></td>";

                        echo "<td><span class='display-text'>" . $row["department"] . "</span>
                                <input class='form-input' type='text' name='department' value='" . $row['department'] . "'></td>";

                        echo "<td><span class='display-text'>R" . $row["salary"] . "</span>
                                <input class='form-input' type='number' name='salary' value='" . $row['salary'] . "'></td>";

                        echo "<td><span class='display-text'>" . $row["employmentHistory"] . "</span>
                                <input class='form-input' type='text' name='employmentHistory' value='" . $row['employmentHistory'] . "'></td>";

                        echo "<td><span class='display-text'>" . $row["contact"] . "</span>
                                <input class='form-input' type='text' name='contact' value='" . $row['contact'] . "'></td>";

                        echo "<td>
                                <button type='button' class='edit-toggle'>Edit</button>
                                <button type='submit' class='save-btn' style='display:none;'>Save</button>
                                <form method='POST' action='delete_employee.php' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $row['employeeId'] . "'>
                                    <button type='submit' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</button>
                                </form>
                            </td>";
                        echo "</tr></form>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No employees found.</td></tr>";
                }

                echo "</table>";
            ?>
        </div>
    </div>
</body>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.querySelector(".toggle_add_employee");
    const form = document.querySelector(".create_employee_form");

    toggleBtn.addEventListener("click", () => {
        form.style.display = form.style.display === "none" ? "block" : "none";
    });

    // Toggle form inputs in table rows
    document.querySelectorAll(".edit-toggle").forEach(btn => {
        btn.addEventListener("click", () => {
            const row = btn.closest("tr");

            // Toggle editing mode
            row.classList.toggle("editing");

            const saveBtn = row.querySelector(".save-btn");
            if (row.classList.contains("editing")) {
                btn.style.display = "none";
                saveBtn.style.display = "inline-block";
            } else {
                btn.style.display = "inline-block";
                saveBtn.style.display = "none";
            }
        });
    });
});
</script>
</html>
