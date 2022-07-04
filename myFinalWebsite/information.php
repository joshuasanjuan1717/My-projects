<?php require_once 'include/auth.php'; ?>
<?php
$id = $_GET['id'];
$add = getId($id);

if(isset($_POST['edit'])){
header('location: editAccount.php?folder_id='.$add['folder_id'].'&id='.$id);
}

if(isset($_POST['buttonDelete'])){
  $new = getfolderId($add['folder_id'])['numLogins'];
  $new = $new -1;
  addAcc($add['folder_id'], $new);

  header('location: deleteAccount.php?folder_id='.$add['folder_id'].'&id='.$id);

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    


<style>
.unselectFolder{

text-decoration: none;
font-size: 20px;
color: white;
display: block;
margin-top: -1px;

}
.space4{
margin-bottom: 12px;
}

.labelName{
  font-size: 20px;
  margin-left: 23px;
  margin-top: -10px;
}
.comment{
  margin-top: -16px;
  width: 400px;
  height: 152px;
  margin-left: 23px;
  resize: none;
}
.comment:read-only{
    background-color: transparent;
}
.name{
  margin-top: -16px;
  width: 400px;
  height: 32px;
  margin-left: 23px;
  background-color: white;
  cursor: default;
}
.name:read-only{
background-color: transparent;
}

.folder{
  margin-top: -16px;
  width: 400px;
  height: 35px;
  margin-left: 23px;
  appearance: none;
}
.nounArrow{
  position: absolute;
  margin-top: -29px;
  margin-left: 375px
}
.add{
  margin-top: 10px;
  width: 400px;
  height: 58px;
  margin-left: 23px;
  border: none;
  background-color: #2B20AE;
  font-size: 22px;
}
.space{
  display: block;
  margin-bottom: 11px;
}
.space2{
  display: block;
  margin-bottom: 25px;
}
.error{
  margin-left: 23px;

}
.labelInformation{
    margin-left: 23px;
    font-size: 27.3px;
    margin-top: -10px;
    margin-bottom: 30px;
    font-weight: 600;
    color: #2B20AE;

}
.eye{
  position: absolute;
  margin-top: -25px;
  margin-left: 349px;
}

.copyEmail{
  position: absolute;
  margin-top: -30px;
  margin-left: 380px;
  background-color: transparent;
  border: transparent;
}
.copyEmail:focus{
  border: transparent;
  outline: none;
}
.edit{
  margin-left: 23px;
  height: 42px;
  width: 185px;
  border: transparent;
  color: white;
  background-color: #2B20AE;
  font-size: 20px;
}
.delete{
  margin-left: 30px;
  height: 42px;
  width: 185px;
  border: transparent;
  color: white;
  background-color: #2B20AE;
  font-size: 20px;
}
.deleteContent{
  position: absolute;
  height: 226px;
  width: 492px;
  border: 1.7px solid black;
  background-color: #D1F0FE;
  display: none;
  
}

.content{
  margin-top: -500px;
  
}
.title{
  font-size: 33px;
  font-weight: 630;
  margin-top: 10px;
  color: #660002;
}
.body{
  text-align: center;
  margin-top: 10px;
  margin-left: 30px;
  margin-right: 30px;
  font-size: 19px;
}
.buttons{
  margin-top: 20px;
}
.buttonDelete{
  height: 45px;
  width: 170px;
  margin-left: 48px;
  font-size: 19px;
  border: transparent;
  background-color: #903509;
  color: white;
  
}
.buttonCancel{
  height: 45px;
  width: 180px;
  margin-left: 48px;
  font-size: 19px;
  border: transparent;
  background-color: #2B20AE;
  color: white;

}
.undone{
  color: #B16A16;
}
.sure{
  color: #676666;
}
.globe{
  position: absolute;
  margin-top: -30px;
  margin-left: 380px;
}
</style>

    </head>

    <body>

    <div class="sidenav">
    <div class = "d-flex justify-content-center navTitle">
    <img src="images/homeLogopng.png" style="margin-top: -4px; margin-bottom: 16px;" alt="logo" width="175" height="39">

</div>
  <a href="index.php" class = "selectNav"> &nbsp;&nbsp;<img src="images/noun-packet-2940135.png" class ="navLogo2" alt="logo" width="35" height="35">&emsp; Packet</a>
  <a href="generate.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-password-generating-3610319.png" class ="navLogo" alt="logo" width="35" height="31"> &emsp;Generate Password</a>
  <a href="settings.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-settings-2650508.png" class ="navLogo" alt="logo" width="33" height="27"> &emsp;Settings</a>
  <a href="addAccount.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-add-account-1559194.png" class ="navLogo" alt="logo" width="33" height="29"> &emsp;Add Account</a>
  <a href="folder.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-folder-2803118.png" class ="navLogo" alt="logo" width="32" height="28">&emsp; Folder</a>
  <p class ="space4"> </p>
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
  <a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class = "unselectFolder">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folder['folder_name'] ?></a>
<?php } ?>
<?php } ?>
</div>

<div class="main" style="height: 1000px">

<form method="post">
<br>
<br>
<br>
<div class="whole">
<p class ="labelInformation">Account Information</p>
<p> </p>
<div class="form-group">
<p class="labelName">Name</p>
<input type="text" name ="name" class="form-control border-dark rounded-0 name" id ="name" value="<?php echo $add['full_name']; ?>" readonly/>
  </div>
  <br>
  <div class="form-group">
<p class="labelName">Email/Username</p>
<input type="text" name ="email" class="form-control border-dark rounded-0 name" id ="email" value="<?php echo $add['user_email']; ?>" readonly/>
<button type ="button" class ="copyEmail" onclick="myUser()"><img id="copyEmail" src="images/noun-copy-2047774.png" width = "28.5" height = "21.5"/></button>

</div>
<br>
<div class="form-group">
<p class="labelName">Password</p>
<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" value="<?php echo Decrypting($add['user_password']); ?>" readonly/>
<img id="openEye" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5" />
<img id="closeEye" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<button type ="button" class ="copyEmail" onclick="myPass()" ><img id="copyPass" src="images/noun-copy-2047774.png" width = "28.5" height = "21.5"/></button>

</div>
  <br>
  <div class="form-group">
<p class="labelName">Folder</p>
<!--<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" placeholder="Enter here" />-->
<input type="text" name ="folder" class="form-control border-dark rounded-0 name" id ="folder" value="<?php echo getfolderId($add['folder_id'])['folder_name']; ?>" readonly/>
  </div>
<br>

  <div class ="d-flex">
  <div class="form-group">
<p class="labelName">Website</p>
<input type="text" name ="website" class="form-control border-dark rounded-0 name" id ="website" value="<?php echo $add['websiteName']; ?>" readonly/>
</div>
&emsp;
<div class="form-group">
<p class="labelName">Website URL</p>
<input type="text" name ="url" class="form-control border-dark rounded-0 name" id ="url" value="<?php echo $add['websiteUrl']; ?>" readonly/>
<?php
if(preg_match_all('/https:/i', $add['websiteUrl']) > 0 ){
  $url = $add['websiteUrl'];
}
else{
  $url ="http://".$add['websiteUrl'];
}
?>

<a href="<?php echo $url; ?>" target="_blank" class="globe"><img src="images/noun-websites-4513842.png" width="32.3" height="22"/></a>
</div>
</div>
<p class ="space"></p>
<div class="form-group">
<p class="labelName">Comment</p>
<textarea type="text" rows="6" name ="comment" class="form-control border-dark rounded-0 comment" id ="comment" style="cursor: default;" readonly><?php echo $add['comment']; ?></textarea>
</div>
<p class ="space2"> </p>
<div class ="d-flex">
<button type="submit" name ="edit" id ="edit" class ="edit">Edit Account</button>
<button type ="button" id="delete" class="delete">Delete Account</button>
  </div>
  </div>
  <div class="d-flex align-items-center justify-content-center content" id ="content">
<div id ="deleteContent" class="deleteContent">
<div class="d-flex align-items-center justify-content-center title">
Confirmation
  </div>
<div class="body">
<span class="sure">Are you sure? The selected item will be deleted permanently and </span><span class="undone">this cannot be undone</span>
  </div>
<div class="d-flex buttons">
<button type ="submit" name ="buttonDelete" class="buttonDelete">Delete</button>
<button type ="button" id="buttonCancel" class="buttonCancel">Cancel</button>
  </div>

  </div>
  </div>

  </form>
  
</div>


<script>

onInactive(60000, function () {
 // alert('Inactive for 5 seconds');
 window.location.href = "include/Logout.php";
});

function onInactive(ms, cb) {

  var wait = setTimeout(cb, ms);

  document.onmousemove = document.onmousedown = document.onmouseup = document.onkeydown = document.onkeyup = document.onscroll = document.focus = function () {
      clearTimeout(wait);

      //reset timer
      wait = setTimeout(cb, ms);

  };
}




function checkLoginStatus(){
     $.get("include/check.php", function(data){
        if(!data) {
            window.location.replace("include/Logout.php");
        }
        setTimeout(function(){  checkLoginStatus(); }, 1); 
        });
}
checkLoginStatus();

$(document).ready(function(){

  if($("#comment").text() === ""){
    $("#comment").text("No comment")
}


  $("#openEye").click( function() {

$("#openEye").hide();
$("#closeEye").show();
$("#pass").attr("type","text");

});

$("#closeEye").click(function() {
    $("#openEye").show();
$("#closeEye").hide();
$("#pass").attr("type","password");

});

$("#delete").click(function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  
  $(".content").css("margin-top","-800px");
  $(".content").animate({ marginTop: '-530px'}, 1000);
  $("#deleteContent").fadeIn(1000);
  //$("body > *").not("body > #elementtokeep").css("filter","blur(4px)");
 $(".sidenav").css("filter","blur(5px)");
 $(".whole").css("filter","blur(5px)");

});

$("#buttonCancel").click(function() {
  //document.body.scrollTop = 0;
 // document.documentElement.scrollTop = 0;
 $(".content").animate({ marginTop: '-800px'}, 1000);

  $("#deleteContent").fadeOut(1000);
  $(".sidenav").css("filter","");
 $(".whole").css("filter","");

});








});
function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
}

function myUser(){
    var copyText = document.getElementById("email");
    copyToClipboard(copyText.value);
    alert("You have copied " + copyText.value);
}
function myPass(){
    var copyText = document.getElementById("pass");
    copyToClipboard(copyText.value);
    alert("You have copied " + copyText.value);
}


</script>


    
   </body>

</html>