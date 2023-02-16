<?php
session_start();
print_r($_SESSION['errors']);
if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error) { echo"<h1>$error<h1>"; }

}
    
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php ?>

<form action="handler.php" method="POST">
<input type="text" name="name" placeholder="Enter your name"><br><br>
<input type="email" name="email" placeholder="Enter your Email"><br><br>
<input type="password" name="password" placeholder="Enter your Password"><br><br>
<input type="number" name="phone" placeholder="Enter your Phone"><br><br>

<input type="submit" name="submit">

</form>



</body>
</html>