<?php require_once 'include/auth.php'; ?>
<?php
ob_start();
?>
<?php
$folder_id = $_POST['folder'];
$errors = [];
if(isset($_POST['add'])){
  $logins = getfolderId($folder_id)['numLogins'];
$errors = Add($_POST);
if(count($errors) ===0){
$logins = $logins +1;
addAcc($folder_id, $logins);
header('location: accounts.php?folder_id='.$folder_id);
ob_end_flush();

}

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
.name{
  margin-top: -16px;
  width: 400px;
  height: 32px;
  margin-left: 23px;
}
.folder{
  margin-top: -16px;
  width: 400px;
  height: 37px;
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
  margin-bottom: -4px;
}
.error{
  margin-left: 23px;

}
.eye{
  position: absolute;
  margin-top: -25px;
  margin-left: 380px;
}
.generatePass{
  position: absolute;
  color: #615F63;
  font-size: 13px;
  margin-left: 23px;
}
.generatePass:hover{
  text-decoration: none;
}

  </style>

    </head>
   
    <body>
    <div class="sidenav">
    <div class = "d-flex justify-content-center navTitle">
<p>PacketLocket</p>
&nbsp;<img src="images/logo2.png" style="margin-top: 5px;" alt="logo" width="35" height="34">
</div>
  <a href="index.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-packet-2940135.png" class ="navLogo" alt="logo" width="35" height="35">&emsp; Packet</a>
  <a href="generate.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-password-generating-3610319.png" class ="navLogo" alt="logo" width="35" height="31"> &emsp;Generate Password</a>
  <a href="settings.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-settings-2650508.png" class ="navLogo" alt="logo" width="33" height="27"> &emsp;Settings</a>
  <a href="addAccount.php?Email=<?php echo getLoggedInUser()['email']; ?>" class = "selectNav"> &nbsp;&nbsp;<img src="images/noun-add-account-1559194.png" class ="navLogo2" alt="logo" width="33" height="29"> &emsp;Add Account</a>
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
<p> </p>
<div class="form-group">
<p class="labelName">Name</p>
<input type="text" name ="name" class="form-control border-dark rounded-0 name" id ="name" placeholder="Enter here" value ="<?php echo $_COOKIE['name']; ?>" />
<div class="error">
<?php displayError($errors, 'name'); ?>
  </div>
  </div>
  <br>
  <div class="form-group">
<p class="labelName">Email/Username</p>
<input type="text" name ="email" class="form-control border-dark rounded-0 name" id ="email" placeholder="Enter here" value ="<?php echo $_COOKIE['email']; ?>"/>
<div class="error">
<?php displayError($errors, 'email'); ?>
  </div>
  </div>
<br>
<div class="form-group">
<p class="labelName">Password</p>
<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" placeholder="Enter here" value ="<?php echo $_COOKIE['pass']; ?>" autocomplete="off"/>
<img id="openEye" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5"/>
<img id="closeEye" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<div class="error">
<?php displayError($errors, 'pass'); ?>
  </div>
  <a href = "generate.php" class="generatePass">Generate Password</a>


  
  </div>
  <br>
  <div class="form-group">
<p class="labelName">Folder</p>
<!--<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass" placeholder="Enter here" />-->
<select name="folder" id="folder" class = "form-control  rounded-0 border border-dark folder">
<option value ="">Choose Folder</option>
<?php foreach(getAddfolder() as $folder){ ?>
<?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
  <?php if($folder['folder_id'] === $_COOKIE['folder']){ ?>
  <option value ="<?php echo $folder['folder_id']; ?>" selected><?php echo $folder['folder_name']; ?></option>
  <?php } else { ?>
    <option value ="<?php echo $folder['folder_id']; ?>"><?php echo $folder['folder_name']; ?></option>
  <?php } ?>
<?php } ?>
<?php } ?>

  </select>
  <img src="images/noun-arrow-down-2424963.png" class="nounArrow" width="40" height="22"/>
  <div class="error">

<?php displayError($errors, 'folder'); ?>
  </div>
  </div>
<br>

  <div class ="d-flex">
  <div class="form-group">
<p class="labelName">Website</p>
<input type="text" name ="website" class="form-control border-dark rounded-0 name" id ="website" placeholder="Enter here" value ="<?php echo $_COOKIE['website']; ?>"/>
<div class="error">
<?php displayError($errors, 'website'); ?>
  </div>
</div>
&emsp;
<div class="form-group">
<p class="labelName">Website URL</p>
<input type="text" name ="url" class="form-control border-dark rounded-0 name" id ="url" placeholder="Enter here" value ="<?php echo $_COOKIE['url']; ?>"/>
<div class="error">
<?php displayError($errors, 'url'); ?>
  </div>
</div>
</div>
<p class ="space"></p>
<div class="form-group">
<p class="labelName">Comment (Optional)</p>
<textarea type="text" rows="6" name ="comment" class="form-control border-dark rounded-0 comment" id ="comment" placeholder="Enter here"><?php echo $_COOKIE['comment']; ?></textarea>
</div>
<p class ="space2"> </p>
<button type ="submit" name="add" class="text-white add" id="add">Add Account</button>
<input type="hidden" value="<?php date_default_timezone_set('Asia/Manila'); echo date("Y-m-d H:i:s"); ?>" name = "Date" readonly/>

  </form>
</div>



<script>

onInactive(60000, function () {
 // alert('Inactive for 5 seconds');
 //window.location.href = "include/Logout.php";
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


</script>

<script>
 // let myName = document.getElementById('name').value;


//document.cookie = "name=" + myName + "; path=/addAccount.php";
//$(document).ready(function(){
  let myName = "";
  $("#name").keyup(function(){
   myName = document.getElementById('name').value;
   document.cookie = "name=" + myName + "; path=/addAccount.php";
  });

  let myEmail = "";
  $("#email").keyup(function(){
    myEmail = document.getElementById('email').value;
   document.cookie = "email=" + myEmail + "; path=/addAccount.php";
  });

  let myPass = "";
  $("#pass").keyup(function(){
    myPass = document.getElementById('pass').value;
   document.cookie = "pass=" + myPass + "; path=/addAccount.php";
  });


 let myFolder ="";
 $("#folder").click(function(){

  myFolder = document.getElementById('folder').value;
  document.cookie = "folder=" + myFolder + "; path=/addAccount.php";

 });

 let myWebsite = "";
  $("#website").keyup(function(){
    myWebsite = document.getElementById('website').value;
   document.cookie = "website=" + myWebsite + "; path=/addAccount.php";
  });

  let myUrl = "";
  $("#url").keyup(function(){
    myUrl = document.getElementById('url').value;
   document.cookie = "url=" + myUrl + "; path=/addAccount.php";
  });

  let myComment = "";
  $("#comment").keyup(function(){
    myComment = document.getElementById('comment').value;
   document.cookie = "comment=" + myComment + "; path=/addAccount.php";
  });


//});

</script>

</body>

</html>
