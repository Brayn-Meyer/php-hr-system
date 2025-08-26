<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content {
            margin-left: 240px; /* 220px sidebar + 20px gap */
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php  
        include "components/sidebar.php";
        include "backend/database.php";
    ?>
    <div class="content">
    <h1>PERFORMANCE PAGE</h1>
    <div>
        <?php
            echo "<br>";

            $performance = "SELECT employeeInformation.name, employeeInformation.department, performancereviews.id, performancereviews.reviewDate, performancereviews.rating, performancereviews.strengths, performancereviews.areasForImprovement, performancereviews.goals, performancereviews.status FROM employeeInformation INNER JOIN performancereviews ON employeeInformation.employeeId = performancereviews.employeeId";
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
                    <th>Actions</th>
                </tr> ";
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"]."</td>".  
                         "<td>" . $row["department"]."</td>".
                         "<td>" . $row["reviewDate"]."</td>" .
                         "<td>" . $row["rating"]."/5</td>" .
                         "<td>" . $row["strengths"]."</td>" .
                         "<td>" . $row["areasForImprovement"]."</td>" .
                         "<td>" . $row["goals"]."</td>" .
                         "<td>" . $row["status"]."</td>" .
                         "<td>
                            <form method='post' action='edit_performance.php' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='name' value='" . $row['name'] . "'>
                                <input type='hidden' name='reviewDate' value='" . $row['reviewDate'] . "'>
                                <input type='hidden' name='rating' value='" . $row['rating'] . "'>
                                <input type='hidden' name='strengths' value='" . $row['strengths'] . "'>
                                <input type='hidden' name='areasForImprovement' value='" . $row['areasForImprovement'] . "'>
                                <input type='hidden' name='goals' value='" . $row['goals'] . "'>
                                <input type='hidden' name='status' value='" . $row['status'] . "'>
                                <button type='submit'>
                                    Edit
                                </button>
                            </form>
                        </td>";
                    echo "<tr>";
                }
            } else {
                echo "No reviews found.";
            }
        ?>
    </div>
</body>
</html>