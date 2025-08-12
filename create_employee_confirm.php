<?php
    session_start();

    include "components/sidebar.php";
    include "backend/database.php";

    try {
        $pdo->beginTransaction();

        // Insert flight if available
        if (isset($_SESSION['employee'])) {
            $f = $_SESSION['employee'];
            $stmt = $pdo->prepare("INSERT INTO employeeinformation (name, position, department, salary, employmentHistory, contact) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $f['e_name'] ?? null,
                $f['e_position'] ?? null,
                $f['e_department'] ?? null,
                $f['e_salary'] ?? null,
                $f['e_employment_history'] ?? null,
                $f['e_contact'] ?? null
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
    <title>Employee Added</title>
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
