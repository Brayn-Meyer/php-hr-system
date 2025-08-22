<?php
    session_start();

    include "components/sidebar.php";
    include "backend/database.php";

    try {
        $pdo->beginTransaction();

        if (isset($_SESSION['create_leave'])) {
            $l = $_SESSION['create_leave'];

            // Get employeeId based on name + department
            $stmt = $pdo->prepare("
                SELECT employeeId 
                FROM employeeinformation 
                WHERE name = ? AND department = ?
            ");
            $stmt->execute([$l['leave_name'] ?? null, $l['leave_department'] ?? null]);
            $employee = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($employee) {
                $employeeId = $employee['employeeId'];

                // Insert into leave table (NOT employeeinformation)
                $stmt = $pdo->prepare("
                    INSERT INTO leaverequests (employeeId, date, reason, status) 
                    VALUES (?, ?, ?, ?)
                ");
                $stmt->execute([
                    $employeeId,
                    $l['leave_date'] ?? null,
                    $l['leave_reason'] ?? null,
                    'Pending'
                ]);
            }
        }


        $pdo->commit();
    } catch (Exception $l) {
        $pdo->rollBack();
        die("Error saving booking: " . $l->getMessage());
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Added Leave Request</title>
</head>
<body>
    <div>
        <div>
            <h4 class="mb-0">Employee Added!</h4>
        </div>
        <div>
            <p>You have added a leave request for <?php echo htmlspecialchars($_SESSION['create_leave']['leave_name'] ?? 'Guest'); ?> in the <?php echo htmlspecialchars($_SESSION['create_leave']['leave_department'] ?? 'Guest'); ?> department!</p>
        </div>
    </div>

    <div>
        <a href="leave_request_page.php" class="btn btn-success">Return to Leave Request Page</a>
    </div>
</body>
