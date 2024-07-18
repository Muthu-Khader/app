<?php
include "../backend/main.php";
global $conn;

$currentTime = time();
$seventyTwoHoursLater = $currentTime + (72 * 60 * 60);
$seventyTwoHoursLaterFormatted = date('Y-m-d H:i:s', $seventyTwoHoursLater);

// Get sorting order from query parameter, default is 'asc'
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

if ($_SESSION['user'] === "ADMIN")
    $sql = "SELECT EmployeeName, Description, EndDate, DATEDIFF(EndDate, NOW()) AS DaysRemaining FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$seventyTwoHoursLaterFormatted}' ORDER BY DaysRemaining $sort_order";
else
    $sql = "SELECT EmployeeName, Description, EndDate, DATEDIFF(EndDate, NOW()) AS DaysRemaining FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$seventyTwoHoursLaterFormatted}' AND EmployeeName = '{$_SESSION['name']}' ORDER BY DaysRemaining $sort_order";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker</title>
    <style>
        body {
            background-color: #121212;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .notification-container {
            padding: 20px;
            background-color: #333;
            color: #fff;
        }
        .notification {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #444;
            border: 1px solid #666;
        }
        .notification h3 {
            color: #f0f0f0;
        }
        .notification p {
            margin: 5px 0;
        }
        .no-notification {
            color: #fff;
        }
        .back-btn {
            position: fixed;
            background-color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            top: 5px;
            left: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor:pointer;
        }

        .back-btn > a {
            text-decoration: none;
            color: #000;
            font-size: 25px;
            font-style: italic;
            font-weight: 600;
        }

        .sort-options {
            position: fixed;
            background-color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            top: 5px;
            right: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor:pointer;
        }
 
        .hidden{
           width:0;
           height:0;
        }

        .funnel{
            color:#111927;
            font-size:18px;
            font-style:italic;
            font-weight:700;
        }

    </style>
</head>
<body>
    <div class="back-btn">
        <?php
        if ($_SESSION['user'] === "ADMIN")
            echo '<a href="../templates/admin.php">&larr;</a>';   
        else
            echo '<a href="../templates/employee.php">&larr;</a>';
        ?>
    </div>


    <input class="hidden" id="sort" type="checkbox" />
    <label class="sort-options" for="sort"><ion-icon class="funnel" name="funnel-outline"></ion-icon></label>


    <div class="container">

        <div class="notification-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $employeeName = $row['EmployeeName'];
                    $description = $row['Description'];
                    $endDate = $row['EndDate'];
                    $daysRemaining = $row['DaysRemaining'];

                    if ($_SESSION['user'] === "ADMIN") {
                        echo '<div class="notification dark-theme">';
                        echo '<h3>Task Deadline Reminder</h3>';
                        echo '<p>Employee: ' . htmlspecialchars($employeeName) . ',</p>';
                        echo '<p>This is a reminder that his/her task \'' . htmlspecialchars($description) . '\' is ending on ' . htmlspecialchars($endDate) . '.</p>';
                        echo '<p>Days remaining: ' . htmlspecialchars($daysRemaining) . '</p>';
                        echo '</div>';
                    } else {
                        echo '<div class="notification dark-theme">';
                        echo '<h3>Task Deadline Reminder</h3>';
                        echo '<p>Dear ' . htmlspecialchars($employeeName) . ',</p>';
                        echo '<p>This is a reminder that your task \'' . htmlspecialchars($description) . '\' is ending on ' . htmlspecialchars($endDate) . '.</p>';
                        echo '<p>Please complete it before the deadline.</p>';
                        echo '<p>Days remaining: ' . htmlspecialchars($daysRemaining) . '</p>';
                        echo '</div>';
                    }
                }
            } else {
                echo '<p class="no-notification">No tasks ending within the next 72 hours.</p>';
            }
            ?>
        </div>
    </div>
    <script>
        const sortCheckbox = document.getElementById("sort");

        const urlParams = new URLSearchParams(window.location.search);
        const sortOrder = urlParams.get('sort');
        if (sortOrder === 'desc') {
            sortCheckbox.checked = true;
        } else {
            sortCheckbox.checked = false;
        }

        sortCheckbox.addEventListener('change', function() {
            const currentUrl = window.location.href;
            const url = new URL(currentUrl);

            // Toggle sort order based on current checkbox state
            if (sortCheckbox.checked) {
                url.searchParams.set('sort', 'desc');
            } else {
                url.searchParams.set('sort', 'asc');
            }

            window.location.href = url.toString();
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
