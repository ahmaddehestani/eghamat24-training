<?php
require('./services/helper.php');
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user=login($email,$password);
    if(!$user){
        echo "your email or password wrong";
    }else{
        $_SESSION['user']="admin";
        redirect('panel.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form method='post'>
    <input type="text"  name="email">
    <input type="password"   name="password">
   
    <input type="submit" value="login"/>

    </form>
</body>
</html>