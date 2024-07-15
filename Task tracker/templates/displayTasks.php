<?php
include_once "../backend/main.php";

global $conn;
$query = "SELECT * FROM Tasks";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks tracker</title>
    <style>
        *{
            box-sizing:border-box;
        }
        
        body {
        background-color: #121212;
        color: #7fbf00;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        min-height:100vh;
        display:flex;
        justify-content:center;
        }

        .task-bg {
        background-color: #1e1e1e;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .task-container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        }

        .align-normal {
        text-align: left;
        }

        .center-text {
        text-align: center;
        }

        .table-container {
        width: 100%;
        overflow-x: auto; /* Enable horizontal scrolling if needed */
        }

        .dark-table {
        width: 100%;
        border-collapse: collapse;
        }

        .dark-table th,
        .dark-table td {
        padding: 12px 15px;
        text-align: left;
        }

        .dark-table thead th {
        background-color: #333333;
        color: #a4b1cd;
        font-weight: bold;
        }

        .dark-table tbody tr:nth-child(odd) {
        background-color: #2a2a2a;
        }

        .dark-table tbody tr:nth-child(even) {
        background-color: #242424;
        }

        .dark-table tbody tr:hover {
        background-color: #444444;
        }

        .dark-table th,
        .dark-table td {
        border: 1px solid #444444;
        }

    </style>
</head>
<body>
    <div class="task-bg">
        <div class="task-container align-normal">
            <h3 class="tertiary-heading tertiary-heading--grey task--head center-text">Tasks Assigned</h3>
            <div class="table-container">
                <table class="dark-table">
                    <thead>
                        <tr>
                            <th class="task--heading">Employee Name</th>
                            <th class="task--heading">Task</th>
                            <th class="task--heading">Start date</th>
                            <th class="task--heading">End date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr class="task">
                                        <td><?php echo $row['EmployeeName'] ?></td>
                                        <td><?php echo $row['Description'] ?></td>
                                        <td><?php echo $row['StartDate'] ?></td>
                                        <td><?php echo $row['EndDate'] ?></td>
                                    </tr>
                                <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
