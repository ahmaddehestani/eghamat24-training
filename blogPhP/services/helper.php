<?php
session_start();

function get_summary($str,$length=120){
    return substr($str,0,$length).'...';

}


function login($email,$password){
    if($email==="ahmad@gmail.com" and $password==="123456"){
        return true;

    }else{
        return false;

    }
    
}

function redirect($url)
{
    if (!headers_sent()){
        header("Location: $url");
    }else{
        echo "<script type='text/javascript'>window.location.href='$url'</script>";
        echo "<noscript><meta http-equiv='refresh' content='0;url=$url'/></noscript>";
    }
    exit;
}
 function auth(){
    if(isset($_SESSION['user'])){
        return true;
    }
    else{
        return false;
    }
 }
 function logout(){
    unset($_SESSION['user']);
    redirect('login.php');
 }

?>