<?php

function login($conn,$type)
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(is_connected($conn)){
        if($type === 'ADMIN'){
            $statement = $conn->prepare("SELECT * FROM ADMIN WHERE email = ?");
        }else if($type === 'EMP'){
            $statement = $conn->prepare("SELECT * FROM EMP WHERE email = ?");
        }
        $statement->bind_param("s",$email);
        $statement->execute();
        $result = $statement->get_result();
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            if(verify_hash($password,$data['password'])){
                if($type === 'ADMIN'){
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
    }else{
        die("Connection Failed" . $conn->connect_error);
    }
}
?>