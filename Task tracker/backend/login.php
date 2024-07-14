<?php
include_once "main.php";

function login($password){

    $user = $_SESSION["user"];
    $email = $_SESSION["email"];
    global $conn; 

    $data = getUserData($conn,$user,$email);
    if($data){
        if(verify_hash($password,$data['PASSWORD'])){
            if($user === 'ADMIN'){
                include "../templates/admin.php";
            }else{
                include "../templates/employee.php";
            }
        }else{
            include "../templates/invalidPassword.html";

        }
    }else{
        include "../templates/invalidEmail.html";
    }

}