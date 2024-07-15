<?php
include_once "../backend/main.php";

global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeName = mysqli_real_escape_string($conn, $_POST['employee_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);

    if($employeeName !== "NULL"){

        $query = "INSERT INTO Tasks (EmployeeName, Description, StartDate, EndDate) VALUES ('$employeeName', '$description', '$startDate', '$endDate')";
        
        if (mysqli_query($conn, $query)) {
            echo "New task created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }else{
        echo "Please select the employee to assign a task";
    }
}
?>