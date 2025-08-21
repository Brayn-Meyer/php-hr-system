<?php
    session_start();
    include "backend/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $name = $_POST['name'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $salary = floatval($_POST['salary']);
        $employmentHistory = $_POST['employmentHistory'];
        $contact = $_POST['contact'];
    } else {
        header("Location: employee_page.php");
        exit();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h3>Edit <?php echo $name?>'s Information.</h3>
    <form action="edit_employee_confirm.php" method="post">
        <?php
        echo "  <label for='e_name'>Name : </label>
                <input type='hidden' name='id' value='$id'>
                <input value='$name' name='name' type='text'>
                <br>
                <label for='e_position'>Position : </label>
                <input value='$position' name='position' type='text'>
                <br>
                <label for='e_department'>Department : </label>
                <input value='$department' name='department' type='text'>
                <br>
                <label for='e_salary'>Salary : </label>
                <input value='$salary' name='salary' type='number'>
                <br>
                <label for='e_employment_history'>Employment History : </label>
                <input value='$employmentHistory' name='employment_history' type='text'>
                <br>
                <label for='e_contact'>Contact : </label>
                <input value='$contact' name='contact' type='text'>
                <br><br>
            "
        ?>
        <button type="submit">Submit</button>
    </form>
</body>