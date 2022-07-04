<?php

require_once('function.php');
//$user = getUser($_COOKIE['myEmail']);
//$_SESSION[USER_SESSION_KEY] = $user;

if(!isUserLoggedIn()){
    redirect('login.php');
   
}