<?php require_once('function.php');
 
$number = $_GET['Number'];

editmyPhone($number, getLoggedInUser()['email']);

    
?>


<script>


document.cookie = "verifyPhone=true; path=/settings.php";

document.cookie = "oldPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "newPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "cnewPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";

window.location.href= '../settings.php';

</script>