<?php
include "main.php";
include "login.php";

session_start();

$_SESSION['user'] = "EMPLOYEE";
$_SESSION['email'] = $_POST["email"];
$password = $_POST["password"];
login($password);

?>