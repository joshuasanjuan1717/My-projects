<?php require_once('function.php');
 
$email = $_GET['Email'];

editmyEmail($email, getLoggedInUser()['email']);

    // editmyEmailFolder($_POST, $acc['email']);
   
     editmyEmailDevice($email, getLoggedInUser()['email']);
   
   //  editmyEmailGenerate($_POST, $acc['email']);
   
    // editmyEmailAdd($_POST, $acc['email']);
   
   // editmyEmailVerify($_POST, $acc['email']);

   $user = getUser($email);
  $_SESSION[USER_SESSION_KEY] = $user;


//header("refresh: 5; url: ../register.php");
?>


<script>


document.cookie = "verifyEmail=true; path=/settings.php";

document.cookie = "oldEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "newEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";

window.location.href= '../settings.php';

</script>