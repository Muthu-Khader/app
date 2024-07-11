<?php

$servername = "localhost";
$username = "Nalan";
$password = "Mysql@Nalan";
$database = "targetapp";

$conn = new mysqli($servername,$username,$password,$database);
function is_connected($conn){
    if($conn->connect_error){
        return False;
    }else{
        return True;
    }
}