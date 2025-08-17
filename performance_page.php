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
            $stmt = $pdo->query($performance);

            echo "<table>
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
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                echo "No reviews found.";
            }
        ?>
    </div>
</body>
</html>