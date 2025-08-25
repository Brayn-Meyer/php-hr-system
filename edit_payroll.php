<?php
session_start();
include "backend/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $hoursWorked = $_POST['hoursWorked'];
    $leaveDeductions = $_POST['leaveDeductions'];
} else {
    header("Location: payroll_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payroll</title>
</head>
<body>
    <h3>Edit <?php echo htmlspecialchars($name) ?>'s Leave Request.</h3>
    <form action="edit_payroll_confirm.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="hoursWorked">Hours Worked :</label>
        <input type="number" id="hoursWorked" name="hoursWorked" value="<?php echo htmlspecialchars($hoursWorked); ?>">
        <br>

        <label for="leaveDeductions">Leave Days Taken :</label>
        <input type="number" id="leaveDeductions" name="leaveDeductions" value="<?php echo htmlspecialchars($leaveDeductions); ?>">
        <br>

        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
