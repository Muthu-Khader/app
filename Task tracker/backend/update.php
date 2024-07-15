<?php

include_once "main.php";

$user = $_SESSION['user'];
$email = $_SESSION['email'];


$user = getUserData($conn,$user,$email);

if($user){

    $updateName = $_POST['updateName'];
    $updateEmail = $_POST['updateEmail'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

     // UPDATING PROFILE PICTURE

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

    // UPDATING PASSWORD
    if($oldPassword !== "" && $newPassword !== "" && $confirmPassword !== ""){
        $password = $user["PASSWORD"];
        if(verify_hash($oldPassword,$password)){
            $hash = hash_data($newPassword);
            updateUserData("PASSWORD",$hash);
        }else{
            echo "Incorrect Password";
        }
    }

     // UPDATING NAME AND EMAIL
    if($updateName !== "" && $updateName !== $user["NAME"] ){
        updateUserData("NAME",$updateName);
    }
    if($updateEmail !== "" && $updateEmail !== $user["EMAIL"] ){
        updateUserData("EMAIL",$updateEmail);
        $_SESSION['email'] = $updateEmail;
    }
    echo "profile updated successfully";
}else{

    echo "profile updation failed";
}
?>