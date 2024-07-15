<?php
include_once "../backend/main.php";

global $conn;
$query = "SELECT NAME FROM EMPLOYEE";
$result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task tracker</title>
    <link rel="stylesheet" href="../styles/style.css" />
</head>
<body>
    <div class="task-bg">
        <div class="task-container">
            <h3 class="tertiary-heading tertiary-heading--grey task-head">Create a new Task</h3>
            <form class="task__form" action="../backend/addTask.php" method="post">
                <div class="task__form-group">
                    <label class="task__form-label" for="emp-name">Select employee:</label>
                    <select class="task__form-input" id="emp-name" name="employee_name" class="from-control" required>
                        <option value="NULL">-Select-</option>
                        <?php

                            if(mysqli_num_rows($result)){
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['NAME']; ?>"><?php echo $row['NAME']; ?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="task__form-group">
                    <label class="task__form-label" for="task">Description:</label>
                    <textarea class="task__form-input" name="description" id="task" placeholder="Mention the task" required></textarea>
                </div>
                <div class="task__form-group">
                    <label class="task__form-label" for="start-date">Start date:</label>
                    <input class="task__form-input" type="date" name="start_date" required/>
                </div>
                <div class="task__form-group">
                    <label class="task__form-label" for="end-date">End date:</label>
                    <input class="task__form-input" type="date" name="end_date" required/>
                </div>
                <button class="btn-dash task-btn">Create Task</button>
            </form>
        </div>
    </div>
</body>
</html>