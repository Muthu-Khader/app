<?php

include_once "main.php";
include_once "change_password.php";
session_start();

$user = $_SESSION['user'];
$email = $_SESSION['email'];


$user = getUserData($conn,$user,$email);

if($user){

    $updateName = $_POST['updateName'];
    $updateEmail = $_POST['updateEmail'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if(isset($_FILES['userImage']['name'])){
        $userImage = $_FILES['userImage'];
        
        if ($userImage['error'] == UPLOAD_ERR_OK) {
            $targetDir = "../img/";
            $targetFilePath = $targetDir . basename($userImage['name']);
            move_uploaded_file($userImage['tmp_name'], $targetFilePath);
            updateUserData("PROFILE",$userImage['name']);
        } else {
            $userImage = "user.png";
        }
    }else{
        $userImage = "user.png";
    }



if($updateName !== "" && $updateName !== $user["NAME"] ){
    updateUserData("NAME",$updateName);
}
if($updateEmail !== "" && $updateEmail !== $user["EMAIL"] ){
    updateUserData("EMAIL",$updateEmail);
}


if($oldPassword !== "" && $newPassword !== "" && $confirmPassword !== ""){
    $password = $user["PASSWORD"];
    if(verify_password($password,$oldPassword,$newPassword,$confirmPassword)){
        updateUserData("PASSWORD",hash_data($newPassword));
    }else{
        echo "Incorrect Password";
    }
}
}
    
    

?>