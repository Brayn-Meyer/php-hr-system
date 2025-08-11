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
    <h1>PERFORMANCE PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $performance = "SELECT employeeInformation.name, employeeInformation.department, performancereviews.reviewDate, performancereviews.rating, performancereviews.strengths, performancereviews.areasForImprovement, performancereviews.goals, performancereviews.status FROM employeeInformation INNER JOIN performancereviews ON employeeInformation.employeeId = performancereviews.employeeId";
            $performance_results = mysqli_query($conn, $performance);

            echo "<table border='1px'>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Rating</th>
                    <th>Strenghts</th>
                    <th>Areas for Improvement</th>
                    <th>Goals</th>
                    <th>Status</th>
                </tr> ";
            
            if (mysqli_num_rows($performance_results) > 0) {
                while ($row = mysqli_fetch_assoc($performance_results)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["department"]."</td>".
                         "<td>" . $row["reviewDate"]."</td>" .
                         "<td>" . $row["rating"]."</td>" .
                         "<td>" . $row["strengths"]."</td>" .
                         "<td>" . $row["areasForImprovement"]."</td>" .
                         "<td>" . $row["goals"]."</td>" .
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