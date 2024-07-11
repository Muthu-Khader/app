<?php 
include "main.php";

function hash_data($password,$algorithm = PASSWORD_BCRYPT){
    return password_hash($password,$algorithm);
}


function verify_hash($password,$hash){
    return password_verify($password,$hash);
}

?>