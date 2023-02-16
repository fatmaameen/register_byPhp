<?php
function requiredInput($input){
    if(empty($input)){
        return true;
    }
    return false;
}
function minLength($input ,$length){
    if(strlen($input)<$length){
        return true;
    }
    return false;
}
function maxLength ($input ,$length){
    if(strlen($input)>$length){
        return true;
    }
    return false;
}
function checkEmail($input){
    if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
function checkInt($input){
    if(!filter_var($input,FILTER_VALIDATE_INT)){
        return true;
    }
    return false;
}











?>