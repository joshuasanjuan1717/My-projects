<?php

require_once 'include/connection.php';
$id = $_GET['id'];
$folder_id = $_GET['folder_id'];
deleteId($id);


?>

<script>
window.location.href = "accounts.php?folder_id="+ "<?php echo $folder_id; ?>";

</script>