<?php 

require_once 'include/connection.php';
$email = $_GET['email'];
deleteAllHistory( getUser($email)['myId'])

?>

<script>
window.location.href = "generate.php";

</script>