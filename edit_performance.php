<?php
session_start();
include "backend/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $reviewDate = $_POST['reviewDate'];
    $rating = intval($_POST['rating']);
    $strengths = $_POST['strengths'];
    $areasForImprovement = $_POST['areasForImprovement'];
    $goals = $_POST['goals'];
    $status = $_POST['status'];
} else {
    header("Location: employee_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h3>Edit <?php echo htmlspecialchars($name) ?>'s Performance Review.</h3>
    <form action="edit_performance_confirm.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="reviewDate">Review Date :</label>
        <input type="date" id="reviewDate" name="reviewDate" value="<?php echo htmlspecialchars($reviewDate); ?>">
        <br>

        <label for="rating">Rating :</label>
        <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo htmlspecialchars($rating); ?>">
        <br>

        <label for="strengths">Strengths :</label> <br>
        <textarea id="strengths" name="strengths"><?php echo htmlspecialchars($strengths); ?></textarea>
        <br>
 
        <label for="areasForImprovement">Areas For Improvement :</label> <br>
        <textarea id="areasForImprovement" name="areasForImprovement" ><?php echo htmlspecialchars($areasForImprovement); ?></textarea>
        <br>

        <label for="goals">Goals :</label> <br>
        <textarea id="goals" name="goals" ><?php echo htmlspecialchars($goals); ?></textarea>
        <br>

        <label for="status">Status :</label>
        <select id="status" name="status">
            <?php if ($status == "Completed"): ?>
                <option value="<?php echo htmlspecialchars($status); ?>">Completed</option>
                <option value="Draft">Draft</option>
                <option value="Archived">Archived</option>
            <?php elseif ($status == "Draft"): ?>
                <option value="<?php echo htmlspecialchars($status); ?>">Draft</option>
                <option value="Completed">Completed</option>
                <option value="Archived">Archived</option>
            <?php elseif ($status == "Archived"): ?>
                <option value="<?php echo htmlspecialchars($status); ?>">Archived</option>
                <option value="Completed">Completed</option>
                <option value="Draft">Draft</option>
            <?php endif; ?>
        </select>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
