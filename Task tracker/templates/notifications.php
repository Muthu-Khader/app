<?php
include "../backend/main.php";
global $conn;

$currentTime = time();
$twentyFourHoursLater = $currentTime + (24 * 60 * 60);
$twentyFourHoursLaterFormatted = date('Y-m-d H:i:s', $twentyFourHoursLater);

$sql = "SELECT EmployeeName, Description, EndDate FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$twentyFourHoursLaterFormatted}'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task tracker</title>
    <style>
        body {
        background-color: #121212;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        min-height:100vh;
        display:flex;
        justify-content:center;
        }

        .notification-container {
            padding: 20px;
            background-color: #333; /* Dark background color */
            color: #fff; /* Light text color */
        }

        .notification {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #444; /* Slightly lighter background */
            border: 1px solid #666;
        }

        .notification h3 {
            color: #f0f0f0; /* Header color */
        }

        .notification p {
            margin: 5px 0;
        }

        .no-notification{
            color:#fff;
        }

    </style>
</head>
<body>
<?php
if ($result->num_rows > 0) {
    echo '<div class="notification-container">';
    while ($row = $result->fetch_assoc()) {
        $employeeName = $row['EmployeeName'];
        $description = $row['Description'];
        $endDate = $row['EndDate'];

        echo '<div class="notification dark-theme">';
        echo '<h3>Task Deadline Reminder</h3>';
        echo '<p>Dear ' . htmlspecialchars($employeeName) . ',</p>';
        echo '<p>This is a reminder that your task \'' . htmlspecialchars($description) . '\' is ending on ' . htmlspecialchars($endDate) . '.</p>';
        echo '<p>Please complete it before the deadline.</p>';
        echo '</div>';
    }
    echo '</div>'; 
} else {
    echo '<p class="no-notification">No tasks ending within the next 24 hours.</p>';
}

$conn->close();
?>
</body>
</html>