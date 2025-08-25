<?php
session_start();
include "backend/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
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
    <h3>Edit <?php echo htmlspecialchars($name) ?>'s Leave Request.</h3>
    <form action="edit_leave_confirm.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="date">Date :</label>
        <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
        <br>

        <label for="reason">Reason :</label>
        <input type="text" id="reason" name="reason" value="<?php echo htmlspecialchars($reason); ?>">
        <br>

        <label for="status">Status :</label>
        <select id="status" name="status">
            <?php if ($status == "Approved"): ?>
                <option value="<?php echo htmlspecialchars($status); ?>">Approved</option>
                <option value="Denied">Denied</option>
                <option value="Pending">Pending</option>
            <?php elseif ($status == "Denied"): ?>
                <option value="<?php echo htmlspecialchars($status); ?>">Denied</option>
                <option value="Approved">Approved</option>
                <option value="Pending">Pending</option>
            <?php endif; ?>
        </select>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
