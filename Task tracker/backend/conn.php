<?php

$servername = "localhost";
$username = "Nalan";
$password = "Mysql@Nalan";
$database = "targetapp";

$conn = new mysqli($servername,$username,$password,$database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getUserData() {
    global $conn;
    $tb_name=$_SESSION['user'];
    $email=$_SESSION['email'];

    $query = "SELECT * FROM ".$tb_name." WHERE EMAIL = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        return $result->fetch_assoc();
    }else{
        return FALSE;
    }
}

function updateUserData($field,$value) {
    global $conn;
    $tb_name=$_SESSION['user'];
    $email=$_SESSION['email'];

    $query = "UPDATE ".$tb_name." SET ".$field." = ? WHERE EMAIL = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss",$value, $email); 
    $stmt->execute();
}
?>

