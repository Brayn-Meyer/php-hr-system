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
    <div>
        <?php
            echo "<br>";

            $employees = "SELECT * FROM employeeinformation";
            $employees_results = mysqli_query($conn, $employees);

            echo "<table border='1px'>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Employment History</th>
                    <th>Contact</th>
                </tr> ";

            if (mysqli_num_rows($employees_results) > 0) {
                while ($row = mysqli_fetch_assoc($employees_results)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["position"]."</td>".
                         "<td>" . $row["department"]."</td>" .
                         "<td>" . $row["salary"]."</td>".
                         "<td>" . $row["employmentHistory"]."</td>".
                         "<td>" . $row["contact"]."</td>";
                    echo "<tr>";
                }
            } else {
                echo "No employees found.";
            }
        ?>
    </div>
</body>
</html>