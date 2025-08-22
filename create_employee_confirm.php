<?php
    session_start();

    include "components/sidebar.php";
    include "backend/database.php";

    try {
        $pdo->beginTransaction();

        if (isset($_SESSION['create_employee'])) {
            $e = $_SESSION['create_employee'];
            $stmt = $pdo->prepare("INSERT INTO employeeinformation (name, position, department, salary, employmentHistory, contact) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $e['employee_name'] ?? null,
                $e['employee_position'] ?? null,
                $e['employee_department'] ?? null,
                $e['employee_salary'] ?? null,
                $e['employee_employment_history'] ?? null,
                $e['employee_contact'] ?? null
            ]);

            $Id = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO payrolldata (employeeId, hoursWorked, leaveDeductions, finalSalary) VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $Id,
                160,
                0,
                $e['employee_salary'] ?? null,
            ]);

            $stmt = $pdo->prepare("INSERT INTO performancereviews (employeeId, reviewDate, rating, status) VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $Id,
                date('Y-m-d'),
                1,
                "Draft"
            ]);
        }

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Error saving booking: " . $e->getMessage());
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <div>
        <div>
            <h4 class="mb-0">Employee Added!</h4>
        </div>
        <div>
            <p>You have added <?php echo htmlspecialchars($_SESSION['create_employee']['employee_name'] ?? 'Guest'); ?> to the team!</p>
        </div>
    </div>

    <div>
        <a href="employeemployee_page.php" class="btn btn-success">Return to Employee Page</a>
    </div>
</body>
