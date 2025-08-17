<?php
    session_start();

    include "components/sidebar.php";
    include "backend/database.php";

    try {
        $pdo->beginTransaction();

        // Insert flight if available
        if (isset($_SESSION['cre_employee'])) {
            $e = $_SESSION['cre_employee'];
            $stmt = $pdo->prepare("INSERT INTO employeeinformation (name, position, department, salary, employmentHistory, contact) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $e['e_name'] ?? null,
                $e['e_position'] ?? null,
                $e['e_department'] ?? null,
                $e['e_salary'] ?? null,
                $e['e_employment_history'] ?? null,
                $e['e_contact'] ?? null
            ]);

            $Id = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO payrolldata (employeeId, hoursWorked, leaveDeductions, finalSalary) VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $Id,
                160,
                0,
                $e['e_salary'] ?? null,
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
            <p>You have added <?php echo htmlspecialchars($_SESSION['employee']['e_name'] ?? 'Guest'); ?> to the team!</p>
        </div>
    </div>

    <div>
        <a href="employee_page.php" class="btn btn-success">Return to Employee Page</a>
    </div>
</body>
