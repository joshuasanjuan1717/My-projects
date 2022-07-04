<?php require_once 'include/auth.php'; ?>
<?php
$id = $_GET['id'];
$add = getId($id);
$folder_id = $_GET['folder_id'];
$errors = [];
if($_POST['email'] != $add['user_email'] || strtolower($_POST['website']) != strtolower($add['websiteName'])){
foreach(getAdd() as $addval){
  if($addval['myId'] === getLoggedInUser()['myId']){
    
    if($_POST['email'] === $addval['user_email'] && strtolower($addval['websiteName']) === strtolower($_POST['website'])){
      $errors['email'] = 'This item already exists';
  }
    }
  }
}
else if(preg_match('/\\s/i', $_POST['email']) > 0){
  $errors['email'] = 'The email or username is invalid';

}


if(isset($_POST['edit'])){
if(count($errors)===0){
    if($_POST['name'] === ""){
        $_POST['name'] = $add['full_name'];
    }
    if($_POST['email'] === ""){
        $_POST['email'] = $add['user_email'];
    }
    if($_POST['pass'] === ""){
        $_POST['pass'] = Decrypting($add['user_password']);
    }
    if($_POST['website'] === ""){
        $_POST['website'] = $add['websiteName'];
    }
    if($_POST['url'] === ""){
        $_POST['url'] = $add['websiteUrl'];
    }
    if($_POST['comment'] === ""){
        $_POST['comment'] = $add['comment'];
    }
    
    if($_POST['folder'] != $folder_id){
      $old = getfolderId($folder_id)['numLogins'];
      $new = getfolderId($_POST['folder'])['numLogins'];
      $old = $old - 1;
      $new = $new + 1;
      addAcc($folder_id, $old);
      addAcc($_POST['folder'], $new);

    }
    
    if($_POST['name'] === $add['full_name'] && $_POST['email'] === $add['user_email'] && $_POST['pass'] === Decrypting($add['user_password']) && $_POST['website'] === $add['websiteName'] && $_POST['url'] === $add['websiteUrl'] && $_POST['comment'] === $add['comment'] && $_POST['folder'] === $folder_id ){
      $_POST['Date'] = $add['lastUpdate'];
    }

    editAcc($_POST);
    header('location: accounts.php?folder_id='.$_POST['folder']);

  }
}

if(isset($_POST['cancel'])){
    header('location: information.php?id='.$id);
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
  margin-left: 379px;
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
.globe{
  position: absolute;
  margin-top: -30px;
  margin-left: 380px;
}
.error{
  margin-left: 23px;

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
<input type ="hidden" name = "id" value ="<?php echo $id; ?>" readonly/>
<p class ="labelInformation">Editing Account...</p>
<p> </p>
<div class="form-group">
<p class="labelName">Name</p>

<input type="text" name ="name" class="form-control border-dark rounded-0 name" id ="name" value="<?php echo $add['full_name']; ?>" placeholder="Enter here"/>
  </div>
  <br>
  <div class="form-group">
<p class="labelName">Email/Username</p>
<?php
$myEmail = "";
if(isset($_POST['edit'])){
  $myEmail = $_POST['email'];
}
else{
  $myEmail = $add['user_email'];
}
?>

<input type="text" name ="email" class="form-control border-dark rounded-0 name" id ="email" value="<?php echo $myEmail; ?>" placeholder="Enter here"/>
<div class="error">

<?php displayError($errors, 'email'); ?>
  </div>
</div>
<br>
<div class="form-group">
<p class="labelName">Password</p>
<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" value="<?php echo Decrypting($add['user_password']); ?>" autocomplete="off" placeholder="Enter here"/>
<img id="openEye" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5" />
<img id="closeEye" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>

</div>
  <br>
  <div class="form-group">
<p class="labelName">Folder</p>
<!--<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" placeholder="Enter here" />-->
<select name="folder" id="folder" class = "form-control  rounded-0 border border-dark folder">
<?php foreach(getAddfolder() as $folder){ ?>
<?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
    <?php if($folder['folder_name'] === getfolderId($add['folder_id'])['folder_name']){ ?>
        <option value ="<?php echo $folder['folder_id']; ?>" selected><?php echo $folder['folder_name']; ?></option>
<?php } else{?>
  <option value ="<?php echo $folder['folder_id']; ?>"><?php echo $folder['folder_name']; ?></option>
  <?php } ?>
<?php } ?>
<?php } ?>

  </select>
  <img src="images/noun-arrow-down-2424963.png" class="nounArrow" width="40" height="22"/>
  </div>
<br>

  <div class ="d-flex">
  <div class="form-group">
<p class="labelName">Website</p>

<?php
$myWebsite = "";
if(isset($_POST['edit'])){
  $myWebsite = $_POST['website'];
}
else{
  $myWebsite = $add['websiteName'];
}
?>

<input type="text" name ="website" class="form-control border-dark rounded-0 name" id ="website" value="<?php echo $myWebsite; ?>" placeholder="Enter here"/>
</div>
&emsp;
<div class="form-group">
<p class="labelName">Website URL</p>
<input type="text" name ="url" class="form-control border-dark rounded-0 name" id ="url" value="<?php echo $add['websiteUrl']; ?>" placeholder="Enter here"/>
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
<textarea type="text" rows="6" name ="comment" class="form-control border-dark rounded-0 comment" id ="comment" placeholder="Enter here"><?php echo $add['comment']; ?></textarea>
</div>
<p class ="space2"> </p>
<div class ="d-flex">
<button type="submit" name ="edit" id ="edit" class ="edit">Save Changes</button>
<button type ="submit" name ="cancel" id="cancel" class="delete">Cancel</button>
  </div>
  <input type="hidden" value="<?php date_default_timezone_set('Asia/Manila'); echo date("Y-m-d H:i:s"); ?>" name = "Date" readonly/>

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