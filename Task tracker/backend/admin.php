<?php
include_once "main.php";
include_once "login.php";

session_start();

$_SESSION['user'] = "ADMIN";
$_SESSION['email'] = $_POST["email"];
$password = $_POST["password"];
login($password);
?>