<?php
include "../backend/main.php";
global $conn;

$currentTime = time();
$twentyFourHoursLater = $currentTime + (24 * 60 * 60);
$twentyFourHoursLaterFormatted = date('Y-m-d H:i:s', $twentyFourHoursLater);

if($_SESSION['user'] === "ADMIN")
    $sql = "SELECT EmployeeName, Description, EndDate FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$twentyFourHoursLaterFormatted}'";
else
    $sql = "SELECT EmployeeName, Description, EndDate FROM Tasks WHERE EndDate BETWEEN NOW() AND '{$twentyFourHoursLaterFormatted}' AND EmployeeName = '{$_SESSION['name']}'";

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

        }

        .container{
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

        .back-btn{
            positiom:fixed;
            background-color:#fff;
            width:40px;
            height:40px;
            border-radius:50%;
            top:5px;
            left:5px;
            display: flex;
            align-items:center;
            justify-content:center;


        }

        .back-btn > a:link,a:visited{
            text-decoration:none;
            color:#000;
            font-size:25px;
            font-style:italic;
            font-weight:600;
        }

    </style>
</head>
<body>
    <div class="back-btn">
        <?php
        if($_SESSION['user'] === "ADMIN")
            echo '<a href="../templates/admin.php">&larr;</a>';   
        else
            echo '<a href="../templates/employee.php">&larr;</a>';
        ?>
    </div>
    <div class="container">
        <?php
            if ($result->num_rows > 0) {
                echo '<div class="notification-container">';
                while ($row = $result->fetch_assoc()) {
                    $employeeName = $row['EmployeeName'];
                    $description = $row['Description'];
                    $endDate = $row['EndDate'];
                    if($_SESSION['user'] === "ADMIN" ){

                        echo '<div class="notification dark-theme">';
                        echo '<h3>Task Deadline Reminder</h3>';
                        echo '<p>Employee:' . htmlspecialchars($employeeName) . ',</p>';
                        echo '<p>This is a reminder that his/her task \'' . htmlspecialchars($description) . '\' is ending on ' . htmlspecialchars($endDate) . '.</p>';
                        echo '</div>';
                    }else{
                        echo '<div class="notification dark-theme">';
                        echo '<h3>Task Deadline Reminder</h3>';
                        echo '<p>Dear ' . htmlspecialchars($employeeName) . ',</p>';
                        echo '<p>This is a reminder that your task \'' . htmlspecialchars($description) . '\' is ending on ' . htmlspecialchars($endDate) . '.</p>';
                        echo '<p>Please complete it before the deadline.</p>';
                        echo '</div>';
                    }
                }
                echo '</div>'; 
            } else {
                echo '<p class="no-notification">No tasks ending within the next 24 hours.</p>';
            }

            $conn->close();
        ?>  
    </div>

</body>
</html>