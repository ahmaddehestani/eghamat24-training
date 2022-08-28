<?php
require('./services/helper.php');
if(!auth()){
    redirect('login.php');
    }
logout();
redirect('index.php')
?>