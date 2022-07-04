<?php 

require_once 'include/connection.php';
$id = $_GET['folder_id'];
deleteAllAdd($id);

deleteFolder($id);
?>

<script>
window.location.href = "folder.php";

</script>

