<?php
include("validation.php");
session_start();
$errors=[];

if( isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=="POST"){


$name= trim(htmlentities(htmlspecialchars($_POST['name'])));
$email=trim(htmlentities(htmlspecialchars($_POST['email'])));
$password=trim(htmlentities(htmlspecialchars($_POST['password'])));
$phone=trim(htmlentities(htmlspecialchars($_POST['phone'])));


if( requiredInput($name)){
    $errors= "required name";

}elseif(minLength($name,3)){
    $errors= "length of name must be greater than 3";
      
}elseif(maxLength($name,30)){
    $errors= "length of name must be smaller than 30";
      
}

if(requiredInput($email)){
    $errors=  "email required";
      
}elseif(checkEmail($email)){
    $errors= "email not correct";
      
}


if(requiredInput($password)){
   $errors= "password required";
      
}elseif(minLength($password,8)){
   $errors=  "password must be greater than 8 chars ";
      
}
if(requiredInput($phone)){
   $errors="phone required";
      
}elseif(checkInt($phone)){
   $errors="phone not correct";
}


if(empty($errors)){

$id=rand(1,1000);


$users=[
"name"=>$name,
"email"=>$email,
"password"=> sha1($password),
"phone"=>$phone,
];
$_SESSION['users']=$users;



if(empty($_SESSION['users'])){
    $_SESSION['users']=$users;
}else{
    array_push($_SESSION['users'],$users);
}


$x=file_get_contents("part.json");
$data=json_decode($x,true);
$data[]=$users;
file_put_contents("part.json" ,json_encode($data));

//setcookie("cookie" ,$_SESSION['users'] , time()+3600 , "/");





}

else{
$_SESSION['errors']=$errors;

header("location: register.php");
}


}else{
   echo "method not supported";
}

echo "<h1> Welcome<h1>";
echo"<a href='logout.php' >Log Out </a>";
?>