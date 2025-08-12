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
    <h1>EMPLOYEE PAGE</h1>
    <button class="toggle_add_employee">Add Employee</button>
    <br>
    <br>
    <div>
        <form class="create_employee_form" action="create_employee.php" method="post" style="display: none;">
            <label for="e_name">Name : </label>
            <input name="e_name" type="text">
            <br>
            <label for="e_position">Position : </label>
            <input name="e_position" type="text">
            <br>
            <label for="e_department">Department : </label>
            <input name="e_department" type="text">
            <br>
            <label for="e_salary">Salary : </label>
            <input name="e_salary" type="number">
            <br>
            <label for="e_employment_history">Employment History : </label>
            <input name="e_employment_history" type="text">
            <br>
            <label for="e_contact">Contact : </label>
            <input name="e_contact" type="text">
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <?php
            echo "<br>";

            $employees = "SELECT * FROM employeeinformation";
            $stmt = $pdo->query($employees);

            echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Employment History</th>
                    <th>Contact</th>
                    <th></th>
                </tr> ";

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["position"]."</td>".
                         "<td>" . $row["department"]."</td>" .
                         "<td>" . $row["salary"]."</td>".
                         "<td>" . $row["employmentHistory"]."</td>".
                         "<td>" . $row["contact"]."</td>" .
                         "<td><button class='edit_button'>Edit</button> <button class='delete_button'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "No employees found.";
            }
        ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleBtn = document.querySelector(".toggle_add_employee");
        const form = document.querySelector(".create_employee_form");

        toggleBtn.addEventListener("click", () => {
            form.style.display = form.style.display === "none" ? "block" : "none";
        });
    });
</script>
</html>