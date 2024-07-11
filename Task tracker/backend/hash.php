<?php 
include "main.php";

function verify_hash($password,$hash){
    return password_verify($password,$hash);
}
?>