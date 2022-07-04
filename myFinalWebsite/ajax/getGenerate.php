<?php require_once '../include/function.php'; 

$generateHisotories = getGenerateHistory();

?>

<div class = "d-flex">
  <p class ="copyHistorytext"> Copy History </p>
<a href="deleteAll.php?email=<?php echo getLoggedInUser()['email']; ?>" class = "clearAlltext">Clear all</a>
</div>
<hr class ="firstLine" />


<?php foreach($generateHisotories as $generateHisotory){ ?>

  <?php if($generateHisotory['myId'] ===  getLoggedInUser()['myId']){ ?>
<div class ="d-flex parent" >
<p id = "<?php echo $generateHisotory['historyId']; ?>" class = "historytext"><?php echo $generateHisotory['generatedPass']; ?></p>
<p style="position: absolute; margin-left: 50%;"><?php $date=date_create($generateHisotory['history_date']); echo date_format($date,"n/d/y");?></p>
<p id = "<?php echo $generateHisotory['historyId']; ?>hidden" style="display: none;"><?php echo $generateHisotory['generatedPass']; ?></p>
<input id = "<?php echo $generateHisotory['historyId']; ?>hidden2" type ="hidden" value="<?php echo $generateHisotory['generatedPass']; ?>" readonly/>

<button type = "button" onclick="copyToClipboard2('#<?php echo $generateHisotory['historyId']; ?>hidden')" class ="copyhistory"><img src="images/noun-copy-2047774.png" width="32" height="26"/></button>
<a href ="deleteHistory.php?id=<?php echo $generateHisotory['historyId']; ?>" class="deleteHistory"> <img src="images/mobile_delete.png" width="24" height="25" class =""/></a>
</div>
<hr class ="firstLine" />

<?php } ?>

<?php } ?>


<script>

<?php foreach ($generateHisotories as $generateHisotory){ ?>
<?php if($generateHisotory['myId'] ===  getLoggedInUser()['myId']){ ?>

 



if($("#<?php echo $generateHisotory['historyId']; ?>hidden2").val().length <= 16){
//console.log("true");
$("#<?php echo $generateHisotory['historyId']; ?>").html($("#<?php echo $generateHisotory['historyId']; ?>").text());
}
else{
  //console.log("false");
  $("#<?php echo $generateHisotory['historyId']; ?>").html($("#<?php echo $generateHisotory['historyId']; ?>").text().substring(0,16) + "...");

}




<?php } ?>

<?php }?>

</script>



