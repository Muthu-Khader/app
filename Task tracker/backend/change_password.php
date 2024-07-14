<?php

function verify_password($password,$old,$new,$confirm){
    if(verify_hash($old,$password)){
        if($new === $confirm){
            return TRUE;
        }
        return FALSE;
    }
    return FALSE;
}
?>