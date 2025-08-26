<?php
session_start();
include "backend/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $hoursWorked = (int)$_POST['hoursWorked'];
    $leaveDeductions = (int)$_POST['leaveDeductions'];
    $salary = (float)$_POST['salary'];

    $hourlyRate = $salary / 160;
    $dailyRate  = $hourlyRate * 8;

    $finalSalary = ($hoursWorked * $hourlyRate) - ($leaveDeductions * $dailyRate);
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
        <input type="hidden" id="hourlyRate" value="<?php echo $hourlyRate; ?>">
        <input type="hidden" id="dailyRate" value="<?php echo $dailyRate; ?>">

        <label for="hoursWorked">Hours Worked :</label>
        <input type="number" id="hoursWorked" name="hoursWorked" min="0" value="<?php echo htmlspecialchars($hoursWorked); ?>">
        <br>

        <label for="leaveDeductions">Leave Days Taken :</label>
        <input type="number" id="leaveDeductions" name="leaveDeductions" min="0" value="<?php echo htmlspecialchars($leaveDeductions); ?>">
        <br>

        <label for="finalSalary">Final Salary :</label>
        <input type="number" id="finalSalary" name="finalSalary" min="0" value="<?php echo htmlspecialchars($finalSalary); ?>" readonly>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
<script>
function calculateSalary() {
    let hoursWorked = parseFloat(document.getElementById('hoursWorked').value) || 0;
    let leaveDeductions = parseFloat(document.getElementById('leaveDeductions').value) || 0;

    let hourlyRate = parseFloat(document.getElementById('hourlyRate').value) || 0;  // Example, fetch dynamically if needed
    let dailyRate = parseFloat(document.getElementById('dailyRate').value) || 0;

    let finalSalary = (hoursWorked * hourlyRate) - (leaveDeductions * dailyRate);

    document.getElementById('finalSalary').value = finalSalary;
}

document.getElementById('hoursWorked').addEventListener('input', calculateSalary);
document.getElementById('leaveDeductions').addEventListener('input', calculateSalary);
</script>
</html>
