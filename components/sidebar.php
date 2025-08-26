<style>
    .sidebar {
        height: 100vh;               /* full height */
        width: 175px;                /* fixed width */
        position: fixed;             /* stick to left */
        top: 0;
        left: 0;
        background-color: #42505eff;   /* dark sidebar */
        padding-top: 20px;
        list-style-type: none;
        margin: 0;
        z-index: 1000;
    }

    .sidebar li {
        padding: 10px 0px;
    }

    .sidebar li a {
        color: white;
        text-decoration: none;
        display: block;
        font-size: 16px;
        padding: 10px 10px;
    }

    .sidebar li a:hover {
        background-color: #34495e;
        border-radius: 10px 0 0 10px;
    }

    /* Page content pushed right */
    .content {
        margin-left: 225px;
        padding: 20px;
    }
</style>
<ul class="sidebar">
    <li><a href="/php-hr-system/dashboard.php">Dashboard</a></li>
    <li><a href="/php-hr-system/employee_page.php">Employee Page</a></li>
    <li><a href="/php-hr-system/payroll_page.php">Payroll Page</a></li>
    <li><a href="/php-hr-system/attendance_page.php">Attendance Page</a></li>
    <li><a href="/php-hr-system/leave_request_page.php">Leave Request Page</a></li>
    <li><a href="/php-hr-system/performance_page.php">Performance Page</a></li>
</ul>