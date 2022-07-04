<?php 
require_once 'include/auth.php'; 


$acc = getUser(getLoggedInUser()['email']);

if(isset($_POST['security'])){
  $errorsQuestions = editSecurity($_POST);
 
}

$errorsSave = [];
if(isset($_POST['csecurity'])){
  $errorsSave = saveSecurity($_POST);
  if(count($errorsSave) === 0){
    editQuestions($_POST, $acc['email']);
   
  }

}



$errorsPass = [];
if(isset($_POST['savePass'])){

$errorsPass = editPassword($_POST);
if(count($errorsPass) === 0){
  
  if($_POST['clues'] === ""){
    $_POST['clues'] = $acc['password_clues'];
  }

  editPass($_POST, $acc['email']);
  echo '<script>alert("Your password has been changed");</script>';

}


}

$errorsEmail = [];
if(isset($_POST['saveEmail'])){
$errorsEmail = editEmail($_POST);
if(count($errorsEmail) === 0){
/*
  editmyEmail($_POST, $acc['email']);

 // editmyEmailFolder($_POST, $acc['email']);

  editmyEmailDevice($_POST, $acc['email']);

//  editmyEmailGenerate($_POST, $acc['email']);

 // editmyEmailAdd($_POST, $acc['email']);

// editmyEmailVerify($_POST, $acc['email']);
 $user = getUser($_POST['newEmail']);
 $_SESSION[USER_SESSION_KEY] = $user;
*/

forVerification($_POST, getLoggedInUser()['email']);
header('location: include/verifyEmailCode.php?Email='.$_POST['newEmail'].'&oldEmail='.getLoggedInUser()['email']);


}

}

if(isset($_POST['resendEmail'])){
  forVerification($_POST, getLoggedInUser()['email']);
  header('location: include/verifyEmailCode.php?Email='.$_COOKIE['newEmail'].'&oldEmail='.getLoggedInUser()['email']);
  

}



$errorPhone = [];
if(isset($_POST['savePhone'])){

  $errorPhone = editPhone($_POST);

  if(count($errorPhone) === 0){

    forVerification02($_POST, getLoggedInUser()['email']);
    header('location: include/verifyPhoneCode.php?Number='.$_POST['newPhone'].'&oldEmail='.getLoggedInUser()['email']);


  }

}

if(isset($_POST['resendPhone'])){
  forVerification02($_POST, getLoggedInUser()['email']);
    header('location: include/verifyPhoneCode.php?Number='.$_COOKIE['newPhone'].'&oldEmail='.getLoggedInUser()['email']);
  

}



$errorEmailCode = [];
if(isset($_POST['verifySaveEmail'])){
  $errorEmailCode = emailCode($_POST);
  if(count($errorEmailCode) === 0){
    header('location: include/editEmail.php?Email='.$_COOKIE['newEmail']);
   

  }

}


/*
if(isset($_POST['security']) && count($errorsQuestions) === 0){
  //setcookie("sec", "security", "/", NULL);
header('location: include/settingsCookie.php?Email='.getLoggedInUser()['email']);

}
*/

$errorPhoneCode = [];
if(isset($_POST['verifySavePhone'])){
  $errorPhoneCode = phoneCode($_POST);
  
  if(count($errorPhoneCode) === 0){
    header('location: include/editPhone.php?Number='.$_COOKIE['newPhone']);
   

  }
  
}




?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

  


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

.labelAccount{
    margin-left: 23px;
    font-size: 27.3px;
    margin-top: -10px;
    margin-bottom: 30px;
    font-weight: 600;
    color: #2B20AE;

}
.saveEmail{
  width: 220px;
  height: 41px;
  margin-left: 23px;
  background-color: #2B20AE;
  color: white;
  border: none;
  font-size: 23px;
}

.saveEmail:focus{
  outline: none;

}
.selection{
 
  width: 400px;
  height: 36px;
  margin-left: 23px;
  background-color: white;

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

.name2{
  margin-top: -16px;
  width: 400px;
  height: 32px;
  margin-left: 23px;
  background-color: white;
}
.name2:read-only{
background-color: transparent;
}

.labelName{
  font-size: 20px;
  font-family: 'Raleway';
  margin-left: 23px;
  margin-top: -10px;
  color: black;
}
.labelNameEmail{
  font-size: 20px;
  font-family: 'Raleway';
  margin-left: 23px;
  margin-top: -10px;
  color: black;
}

.labelNamePhone{
  font-size: 20px;
  font-family: 'Raleway';
  margin-left: 23px;
  margin-top: -10px;
  color: black;
}


.labelName2{
  font-size: 20px;
  font-family: 'Raleway';
  margin-left: 23px;
  margin-top: -10px;
  color: black;
}

.logout{
margin-left: 106px;
margin-top: -6px;
}
.labelLogout{
  font-size: 23px;
  margin-top: -32px;
  margin-left: 37px;
 color: #615F63;
  
}
.labelLogout:hover{
  text-decoration: none;

}
.logout:hover{
  text-decoration: none;

}
.space{
  margin-top: 28px;
}
.forPass{
  margin-top: 40px;

}
.labelAccount2{
  margin-left: 23px;
    margin-top: 62px;
    margin-bottom: 30px;
}
.space2{
  margin-top: 35px;
}
.labelSec1{
  font-size: 13px;
  margin-left: 23px;
  margin-bottom: 1px;
  margin-top: -11px;
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
.eye{
  position: absolute;
  margin-top: -25px;
  margin-left: 380px;
}
.errors{
  margin-left: 23px;
  width: 400px;
  
}
.addClass::placeholder{
color: #C2C2C2;
}

.verifyEmailStyle{
  margin-top: 262px;

}

.verifyPhoneStyle{
  margin-top: 262px;

}
/* Chrome, Safari, Edge, Opera */
.name2::-webkit-outer-spin-button,
.name2::-webkit-inner-spin-button {
  -webkit-appearance: none !important;
  margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}

.errorEmailCode{
  margin-left: 23px;
}
.resendEmail{
  position: absolute;
  color: blue;
  border: none;
  background-color: transparent;
  margin-left: 365px;
  opacity: 0.5;
}

.resendEmail:focus{
  outline: none;
}

.resendPhone{
  position: absolute;
  color: blue;
  border: none;
  background-color: transparent;
  margin-left: 365px;
  opacity: 0.5;
}

.resendPhone:focus{
  outline: none;
}


  </style>

    </head>

    <body>
      
    <div class="sidenav">
    <div class = "d-flex justify-content-center navTitle">
    <img src="images/homeLogopng.png" style="margin-top: -4px; margin-bottom: 16px;" alt="logo" width="175" height="39">

</div>
  <a href="index.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-packet-2940135.png" class ="navLogo" alt="logo" width="35" height="35">&emsp; Packet</a>
  <a href="generate.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-password-generating-3610319.png" class ="navLogo" alt="logo" width="35" height="31"> &emsp;Generate Password</a>
  <a href="settings.php" class = "selectNav"> &nbsp;&nbsp;<img src="images/noun-settings-2650508.png" class ="navLogo2" alt="logo" width="33" height="27"> &emsp;Settings</a>
  <a href="addAccount.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-add-account-1559194.png" class ="navLogo" alt="logo" width="33" height="29"> &emsp;Add Account</a>
  <a href="folder.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-folder-2803118.png" class ="navLogo" alt="logo" width="32" height="28">&emsp; Folder</a>
  <p class ="space4"> </p>
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
  <a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class = "unselectFolder">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folder['folder_name'] ?></a>
<?php } ?>
<?php } ?>
</div>

<div class="main">
<form method="post">
<br>
<br>
<br>


<input type = "hidden" id ="verifyEmailCode" name ="verifyEmailCode" value ="<?php echo getVerify(getLoggedInUser()['myId'])['code']; ?>" readonly/>
<input type = "hidden" id = "v1" name = "v1" value="" readonly/>
<input type = "hidden" id = "v2" name = "v2" value="" readonly/>


<div class ="d-flex">

  <p class ="labelAccount">Profile Settings</p>
  <a class ="logout" href ="include/Logout.php">
<img src="images/noun-log-out-738609.png" width ="35" height ="30" />
  
<p class="labelLogout">Log Out</p>
</a>
  </div>
<div class="form-group">
<p class="labelName">Name</p>
<input type="text" name ="name" class="form-control border-dark rounded-0 name" id ="name" value="<?php echo $acc['full_name']; ?>" readonly/>
  </div>
  <br>
  <div class="form-group">
<?php
$MyEmail ="";
if(count($errorsEmail) === 0 && isset($_POST['saveEmail'])){
$MyEmail = $_POST['newEmail'];
}
else{
  $MyEmail = $acc['email'];
}

?>

<p class="labelName">Email</p>
<input type="hidden" name ="email" class="form-control border-dark rounded-0 name" id ="email" value="<?php echo $MyEmail; ?>" readonly/>
  </div>
<br>

<?php
$clues ="";
if(count($errorsEmail) === 0 && isset($_POST['savePass'])){
$clues = $_POST['clues'];
}
else{
  $clues = $acc['password_clues'];
}

?>

<div class="form-group">
<p class="labelName">Master Password Clue</p>
<input type="text" name ="clue" class="form-control border-dark rounded-0 name" id ="clue" value="<?php echo $clues; ?>" readonly/>
  </div>
<br>
  <div class="form-group">
<p class="labelName">Phone Number</p>
<input type="hidden" name ="num" class="form-control border-dark rounded-0 name" id ="num" value="<?php echo $acc['phone']; ?>" readonly/>
  </div>
<br>

<div class="d-flex">
<?php
$emailVal1 = "";

if(count($errorsEmail) === 0 && isset($_POST['saveEmail'])){
$emailVal1 = "";

}
else{
$emailVal1 = $_COOKIE['oldEmail'];

}

$emailVal2 = "";

if(count($errorsEmail) === 0 && isset($_POST['saveEmail'])){
$emailVal2 = "";

}
else{
$emailVal2 = $_COOKIE['newEmail'];

}

$passVal1 = "";

if(count($errorsEmail) === 0 && isset($_POST['saveEmail'])){
$passVal1 = "";

}
else{
$passVal1 = $_COOKIE['pass1'];

}

?>


  <div class="forEmail" id = "forEmail">
  <p class ="labelAccount">Change Email</p>
  <div class="form-group">
<p class="labelNameEmail">Old Email</p>
<input type="text" name ="oldEmail" class="form-control border-dark rounded-0 name" id ="oldEmail" placeholder = "Enter here" value="<?php echo $emailVal1; ?>"/>
<div class ="errors">
<?php displayError($errorsEmail, 'oldEmail'); ?>
  </div>
  </div>
<br>
<p></p>
<div class="form-group">
<p class="labelNameEmail">New Email</p>
<input type="text" name ="newEmail" class="form-control border-dark rounded-0 name" id ="newEmail" placeholder = "Enter here" value="<?php echo $emailVal2; ?>"/>
  </div>
<br>
<div class="form-group">
<p class="labelNameEmail">Master Password</p>
<input type="password" name ="pass" class="form-control border-dark rounded-0 name" id ="pass1" placeholder = "Enter here" value="<?php echo $passVal1; ?>" autocomplete="off"/>
<img id="openEye1" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5"/>
<img id="closeEye1" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<div class ="errors">
<?php displayError($errorsEmail, 'newEmail'); ?>
  </div>
  </div>
  <p class="space"> </p>
<button type = "submit" class ="saveEmail" id ="saveEmail" name ="saveEmail">Send Code</button>
  </div>


<div class ="verifyEmailStyle">
<p class="labelName2">Verification Code</p>

<input type="number" name ="verifyEmail" class="form-control border-dark rounded-0 name2" id ="verifyEmail" placeholder = "Enter here" value=""/>
<div class ="errorEmailCode">
<?php displayError($errorEmailCode, 'verifyEmail'); ?>
</div>
<button type ="submit" name="resendEmail" class="resendEmail">Resend</button>
<p class="space"> </p>
<button type = "submit" class ="saveEmail" id ="verifySaveEmail" name ="verifySaveEmail">Save New Email</button>


</div>


  </div>


  <div class ="d-flex">
  <?php
$passVal2 = "";

if(count($errorsPass) === 0 && isset($_POST['savePass'])){
$passVal2 = "";

}
else{
$passVal2 = $_COOKIE['pass2'];

}

$passVal3 = "";

if(count($errorsPass) === 0 && isset($_POST['savePass'])){
$passVal3 = "";

}
else{
$passVal3 = $_COOKIE['pass3'];

}

$passVal4 = "";

if(count($errorsPass) === 0 && isset($_POST['savePass'])){
$passVal4 = "";

}
else{
$passVal4 = $_COOKIE['pass4'];

}

if(count($errorsPass) === 0 && isset($_POST['savePass'])){
  $passVal5 = "";
  
  }
  else{
  $passVal5 = $_COOKIE['clues'];
  
  }


?>


  <div class="forPass" id ="forPass">
  <p class ="labelAccount">Change Password</p>
  <div class="form-group">
<p class="labelName">Old Master Password</p>
<input type="password" name ="oldPass" class="form-control border-dark rounded-0 name" id ="pass2" value="<?php echo $passVal2; ?>" placeholder = "Enter here" autocomplete="off"/>
<img id="openEye2" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5"/>
<img id="closeEye2" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<div class ="errors">
<?php displayError($errorsPass, 'oldPass'); ?>
  </div>
  </div>
<br>
<p></p>
<div class="form-group">
<p class="labelName">New Master Password</p>
<input type="password" name ="newPass" class="form-control border-dark rounded-0 name" id ="pass3" value="<?php echo $passVal3; ?>" placeholder = "Enter here" autocomplete="off"/>
<img id="openEye3" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5"/>
<img id="closeEye3" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<a href ="generate.php" class="generatePass">Generate Password</a>
  </div>
<br>
<div class="form-group">
<p class="labelName">Confirm New Master Password</p>
<input type="password" name ="cnewPass" class="form-control border-dark rounded-0 name" id ="pass4" value="<?php echo $passVal4; ?>" placeholder = "Enter here" autocomplete="off"/>

<img id="openEye4" class ="eye" src="images/noun-eye-3325381.png" width = "32.5" height = "18.5"/>
<img id="closeEye4" class ="eye" src="images/noun-hide-3325178.png" width = "32.5" height = "18.5" style = "display: none;"/>
<div class ="errors">
<?php displayError($errorsPass, 'newPass'); ?>
  </div>
  </div>
<br>

<p class="labelName">New Master Password Clue (Optional)</p>
<input type="text" name ="clues" class="form-control border-dark rounded-0 name" id ="clues" value="<?php echo $passVal5; ?>" placeholder = "Enter here"/>


  <p class="space"> </p>
<button type = "submit" class ="saveEmail" id ="savePass" name ="savePass">Save Password</button>
  </div>
</div>
<br>
<p> </p>
<div class ="d-flex">


<?php

$phoneVal1 = "";

if(count($errorPhone) === 0 && isset($_POST['savePhone'])){
$phoneVal1 = "";

}
else{
$phoneVal1 = $_COOKIE['oldPhone'];

}

$phoneVal2 = "";

if(count($errorPhone) === 0 && isset($_POST['savePhone'])){
$phoneVal2 = "";

}
else{
$phoneVal2 = $_COOKIE['newPhone'];

}

$phoneVal3 = "";

if(count($errorPhone) === 0 && isset($_POST['savePhone'])){
$phoneVal3 = "";

}
else{
$phoneVal3 = $_COOKIE['cnewPhone'];

}




?>


<div class="forPhone" id ="forPhone">
  <p class ="labelAccount">Change Phone Number</p>
  <div class="form-group">
<p class="labelNamePhone">Old Phone Number</p>
<input type="number" name ="oldPhone" class="form-control border-dark rounded-0 name" id ="oldPhone" placeholder = "Enter here" value="<?php echo $phoneVal1; ?>"/>
<div class ="errors">
<?php displayError($errorPhone, 'oldPhone'); ?>
  </div>
  </div>
<br>
<p></p>
<div class="form-group">
<p class="labelNamePhone">New Phone Number</p>
<input type="number" name ="newPhone" class="form-control border-dark rounded-0 name" id ="newPhone" placeholder = "Enter here" value="<?php echo $phoneVal2; ?>"/>
  </div>
<br>
<div class="form-group">
<p class="labelNamePhone">Confirm Phone Number</p>
<input type="number" name ="cnewPhone" class="form-control border-dark rounded-0 name" id ="cnewPhone" placeholder = "Enter here" value="<?php echo $phoneVal3; ?>"/>
<div class ="errors">
<?php displayError($errorPhone, 'newPhone'); ?>
  </div>
  </div>
  <p class="space"> </p>
<button type = "submit" class ="saveEmail" id ="savePhone" name ="savePhone">Send Code</button>
  </div>


<div class ="verifyPhoneStyle">
<p class="labelName" id="label2">Verification Code</p>

<input type="number" name ="verifyPhone" class="form-control border-dark rounded-0 name2" id ="verifyPhone" placeholder = "Enter here" value=""/>
<div class ="errorEmailCode">
<?php displayError($errorPhoneCode, 'verifyPhone'); ?>
</div>
<button class ="resendPhone" name = "resendPhone" type="submit">Resend</button>
<p class="space"> </p>
<button type = "submit" class ="saveEmail" id ="verifySavePhone" name ="verifySavePhone">Save New Phone Number</button>


</div>


  </div>

<br>
<p> </p>
<div class="d-flex">
<div class = "ansFirst" id ="ansFirst">

<p class ="labelAccount">Change Security Questions</p>
<p class ="labelSec1" id = "labelSec">Answer the following questions first before gaining access to change</p>
<div class="form-group">
<select name ="q1" class="form-control border-dark rounded-0 selection" id ="q1">
<option value ="">Chosen Security Question 1</option>
<?php
$pet =""; $teacher=""; 
if($_POST['q1'] === "pet"){ 
  $pet = "selected";
}
if($_POST['q1'] === "teacher"){
$teacher = "selected";
}

  ?>
<option value="pet" <?php echo $pet; ?>>What is your favorite pet?</option>
<option value="teacher" <?php echo $teacher; ?>>Who is your first teacher?</option>
  </select>
  </div>
  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="ans1" class="form-control border-dark rounded-0 name" id ="ans1" placeholder ="Enter here" <?php displayValue($_POST, 'ans1'); ?>/>
<div class ="errors">
<?php displayError($errorsQuestions, 'q1') ?>
  </div>
  </div>

<br>


  <div class="form-group">
<select name ="q2" class="form-control border-dark rounded-0 selection" id ="q2">
<option value ="">Chosen Security Question 2</option>
<?php
$sport =""; $color=""; 
if($_POST['q2'] === "sport"){ 
  $sport = "selected";
}
if($_POST['q2'] === "color"){
$color = "selected";
}
  ?>
                            <option value="sport" <?php echo $sport; ?>>What is your favorite sport?</option>
                            <option value="color" <?php echo $color; ?>>What is your favorite color?</option>
  </select>
  </div>

  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="ans2" class="form-control border-dark rounded-0 name" id ="ans2" placeholder ="Enter here" <?php displayValue($_POST, 'ans2'); ?>/>
<div class ="errors">
<?php displayError($errorsQuestions, 'q2') ?>
  </div>
  </div>
  
<br>


  <div class="form-group">
<select name ="q3" class="form-control border-dark rounded-0 selection" id ="q3">
<option value ="">Chosen Security Question 3</option>

<?php
$singer =""; $study=""; 
if($_POST['q3'] === "singer"){ 
  $singer = "selected";
}
if($_POST['q3'] === "study"){
$study = "selected";
}
  ?>
                            <option value="singer" <?php echo $singer; ?>>What is the name of your favorite singer?</option>
                            <option value="study" <?php echo $study; ?>>Where did you study in highschool?</option>
  </select>
  </div>

  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="ans3" class="form-control border-dark rounded-0 name" id ="ans3" placeholder ="Enter here" <?php displayValue($_POST, 'ans3'); ?>/>
<div class ="errors">
<?php displayError($errorsQuestions, 'q3') ?>
  </div>
  </div>
  
  <button type = "submit" class ="saveEmail" name ="security" id ="security">Submit</button>


  </div>


  <div class = "forSecurity2" id ="ansFirst2">
<div class ="labelAccount2"></div>
<p class ="labelSec1" id ="labelSec2">Setup your new security questions</p>
<div class="form-group">
<select name ="cq1" class="form-control border-dark rounded-0 selection" id ="cq1">
<option value ="">Chosen Security Question 1</option>
<?php
$cpet =""; $cteacher=""; 
if($_POST['cq1'] === "pet"){ 
  $cpet = "selected";
}
if($_POST['cq1'] === "teacher"){
$cteacher = "selected";
}

  ?>

<option value="pet" <?php echo $cpet; ?>>What is your favorite pet?</option>
<option value="teacher" <?php echo $cteacher; ?>>Who is your first teacher?</option>
  </select>
  </div>
  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="cans1" class="form-control border-dark rounded-0 name" id ="cans1" placeholder ="Enter here" <?php displayValue($_POST, 'cans1'); ?>/>
<div class ="errors">
<?php displayError($errorsSave, 'cq1') ?>
  </div>
  </div>
<br>


  <div class="form-group">
<select name ="cq2" class="form-control border-dark rounded-0 selection" id ="cq2">
<option value ="">Chosen Security Question 2</option>
<?php
$csport =""; $ccolor=""; 
if($_POST['cq2'] === "sport"){ 
  $csport = "selected";
}
if($_POST['cq2'] === "color"){
$ccolor = "selected";
}

  ?>

<option value="sport" <?php echo $csport; ?>>What is your favorite sport?</option>
<option value="color" <?php echo $ccolor; ?>>What is your favorite color?</option>
  </select>
  </div>

  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="cans2" class="form-control border-dark rounded-0 name" id ="cans2" placeholder ="Enter here" <?php displayValue($_POST, 'cans2'); ?>/>
<div class ="errors">
<?php displayError($errorsSave, 'cq2') ?>
  </div>
  </div>
<br>


  <div class="form-group">
<select name ="cq3" class="form-control border-dark rounded-0 selection" id ="cq3">
<option value ="">Chosen Security Question 3</option>
<?php
$csinger =""; $cstudy =""; 
if($_POST['cq3'] === "singer"){ 
  $csinger = "selected";
}
if($_POST['cq3'] === "study"){
$cstudy = "selected";
}

  ?>
<option value="singer" <?php echo $csinger; ?>>What is the name of your favorite singer?</option>
<option value="study" <?php echo $cstudy; ?>>Where did you study in highschool?</option>
  </select>
  </div>

  <p class ="space2"> </p>
  <div class="form-group">

<input type="text" name ="cans3" class="form-control border-dark rounded-0 name" id ="cans3" placeholder ="Enter here" <?php displayValue($_POST, 'cans3'); ?>/>
<div class ="errors">
<?php displayError($errorsSave, 'cq3') ?>
  </div>
  </div>

  <button type = "submit" class ="saveEmail" name ="csecurity" id ="csecurity">Save Questions</button>


  </div>


  </div>



  </form>
<br>
<br>
<br>


</div>



<script>
var myEmail = document.getElementById('email');
Array1 = Array.from(myEmail.value);
chars  ="";

let y =0;

for(let j=(Array1.length-1); j>0; j--){
y++;
if(Array1[j] === "@"){

break;

}

}
console.log(y);
console.log(Array1.length);

for(let i = 0; i<Array1.length; i++){

if(i>1 && i < Array1.length-y-2){
chars += Array1[i].replace(Array1[i], "*");
}
else{
  chars += Array1[i];
}

}

document.getElementById('email').value = chars;
console.log(chars);
$("#email").attr("type", "text");

var myNum = document.getElementById('num');
Array2 = Array.from(myNum.value);
nums  ="";
for(let i = 0; i<Array2.length; i++){

if(i>1 && i < Array2.length-2){
  nums += Array2[i].replace(Array2[i], "*");
}
else{
  nums += Array2[i];
}

}

document.getElementById('num').value = nums;
console.log(nums);
$("#num").attr("type", "text");


  </script>

<script>




$(document).ready(function(){





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


for(let i=1;i<=4;i++ ){
  $("#openEye"+i).click( function() {

$("#openEye"+i).hide();
$("#closeEye"+i).show();
$("#pass"+i).attr("type","text");

});

$("#closeEye"+i).click(function() {
    $("#openEye"+i).show();
$("#closeEye"+i).hide();
$("#pass"+i).attr("type","password");

});
}


let oldEmail = "";
  $("#oldEmail").keyup(function(){
    oldEmail = document.getElementById('oldEmail').value;
   document.cookie = "oldEmail=" + oldEmail + "; path=/settings.php";
  });

  let newEmail = "";
  $("#newEmail").keyup(function(){
    newEmail = document.getElementById('newEmail').value;
   document.cookie = "newEmail=" + newEmail + "; path=/settings.php";
  });

  let pass1 = "";
  $("#pass1").keyup(function(){
    pass1 = document.getElementById('pass1').value;
   document.cookie = "pass1=" + pass1 + "; path=/settings.php";
  });


let pass2 = "";
  $("#pass2").keyup(function(){
    pass2 = document.getElementById('pass2').value;
   document.cookie = "pass2=" + pass2 + "; path=/settings.php";
  });

  let pass3 = "";
  $("#pass3").keyup(function(){
    pass3 = document.getElementById('pass3').value;
   document.cookie = "pass3=" + pass3 + "; path=/settings.php";
  });

  let pass4 = "";
  $("#pass4").keyup(function(){
    pass4 = document.getElementById('pass4').value;
   document.cookie = "pass4=" + pass4 + "; path=/settings.php";
  });

  let clues = "";
  $("#clues").keyup(function(){
    clues = document.getElementById('clues').value;
   document.cookie = "clues=" + clues + "; path=/settings.php";
  });


  let oldPhone = "";
  $("#oldPhone").keyup(function(){
    oldPhone = document.getElementById('oldPhone').value;
   document.cookie = "oldPhone=" + oldPhone + "; path=/settings.php";
  });

  let newPhone = "";
  $("#newPhone").keyup(function(){
    newPhone = document.getElementById('newPhone').value;
   document.cookie = "newPhone=" + newPhone + "; path=/settings.php";
  });

  let cnewPhone = "";
  $("#cnewPhone").keyup(function(){
    cnewPhone = document.getElementById('cnewPhone').value;
   document.cookie = "cnewPhone=" + cnewPhone + "; path=/settings.php";
  });




});

</script>

<?php if(count($errorsPass) === 0 && isset($_POST['savePass'])){ ?>
<script>
document.cookie = "pass2=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass4=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
  // window.location.replace("settings.php");
 
</script>

<?php } ?>

<?php if(count($errorsEmail) === 0 && isset($_POST['saveEmail'])){ ?>
<script>
document.cookie = "oldEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
 document.cookie = "newEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
document.cookie = "pass1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
</script>
  <?php } ?>

<script>
  
$("#cq1").removeClass("border-dark");
  $("#cq1").css("border", "1.5px solid #999999");
  $("#cq1").css("background-color", "#FFFFFF");
  $("#cq1").css("color","#C2C2C2");
  $("#cans1").removeClass("border-dark");
  $("#cans1").css("border", "1.5px solid #999999");
  $("#cans1").css("background-color", "#FFFFFF");
  $("#cans1").addClass("addClass");
  $("#cq2").removeClass("border-dark");
  $("#cq2").css("border", "1.5px solid #999999");
  $("#cq2").css("background-color", "#FFFFFF");
  $("#cq2").css("color","#C2C2C2");
  $("#cans2").removeClass("border-dark");
  $("#cans2").css("border", "1.5px solid #999999");
  $("#cans2").css("background-color", "#FFFFFF");
  $("#cans2").addClass("addClass");
  $("#cq3").removeClass("border-dark");
  $("#cq3").css("border", "1.5px solid #999999");
  $("#cq3").css("background-color", "#FFFFFF");
  $("#cq3").css("color","#C2C2C2");
  $("#cans3").removeClass("border-dark");
  $("#cans3").css("border", "1.5px solid #999999");
  $("#cans3").css("background-color", "#FFFFFF");
  $("#cans3").addClass("addClass");
  $("#labelSec2").css("color","#C2C2C2");
$("#csecurity").css("background-color","#AC9EDD");  
$("#ansFirst2 *").attr("disabled", "disabled").off('click');
</script>


<?php if(isset($_POST['security']) && count($errorsQuestions) === 0 ){ ?>
<script>
$("#q1").removeClass("border-dark");
  $("#q1").css("border", "1.5px solid #999999");
  $("#q1").css("background-color", "#FFFFFF");
  $("#q1").css("color","#C2C2C2");
  $("#ans1").removeClass("border-dark");
  $("#ans1").css("border", "1.5px solid #999999");
  $("#ans1").css("background-color", "#FFFFFF");
  $("#ans1").addClass("addClass");
  $("#q2").removeClass("border-dark");
  $("#q2").css("border", "1.5px solid #999999");
  $("#q2").css("background-color", "#FFFFFF");
  $("#q2").css("color","#C2C2C2");
  $("#ans2").removeClass("border-dark");
  $("#ans2").css("border", "1.5px solid #999999");
  $("#ans2").css("background-color", "#FFFFFF");
  $("#ans2").addClass("addClass");
  $("#q3").removeClass("border-dark");
  $("#q3").css("border", "1.5px solid #999999");
  $("#q3").css("background-color", "#FFFFFF");
  $("#q3").css("color","#C2C2C2");
  $("#ans3").removeClass("border-dark");
  $("#ans3").css("border", "1.5px solid #999999");
  $("#ans3").css("background-color", "#FFFFFF");
  $("#ans3").addClass("addClass");
  $("#labelSec").css("color","#C2C2C2");
$("#security").css("background-color","#AC9EDD");  
$("#ansFirst *").attr("disabled", "disabled").off('click');
//document.cookie = "sec=notsecurity";
//window.location.replace("include/settingsCookie.php");

$("#cq1").addClass("border-dark");
  
  $("#cq1").css("background-color", "#FFFFFF");
  $("#cq1").css("color","#6C757D");
  $("#cans1").addClass("border-dark");
  $("#cans1").css("background-color", "#FFFFFF");
  $("#cans1").removeClass("addClass");
  $("#cq2").addClass("border-dark");
  
  $("#cq2").css("background-color", "#FFFFFF");
  $("#cq2").css("color","#6C757D");
  $("#cans2").addClass("border-dark");
  
  $("#cans2").css("background-color", "#FFFFFF");
  $("#cans2").removeClass("addClass");
  $("#cq3").addClass("border-dark");
  
  $("#cq3").css("background-color", "#FFFFFF");
  $("#cq3").css("color","#6C757D");
  $("#cans3").addClass("border-dark");
  
  $("#cans3").css("background-color", "#FFFFFF");
  $("#cans3").removeClass("addClass");
  $("#labelSec2").css("color","#6C757D");
$("#csecurity").css("background-color","#2B20AE");  
$("#ansFirst2 *").attr("disabled", "disabled").off('click');




$("#ansFirst2 *").removeAttr("disabled");



  document.cookie = "sec=security; path=/settings.php";

</script>
<?php } ?>

<?php if($_COOKIE["sec"] === "security"){ ?>
<script>

$("#q1").removeClass("border-dark");
  $("#q1").css("border", "1.5px solid #999999");
  $("#q1").css("background-color", "#FFFFFF");
  $("#q1").css("color","#C2C2C2");
  $("#ans1").removeClass("border-dark");
  $("#ans1").css("border", "1.5px solid #999999");
  $("#ans1").css("background-color", "#FFFFFF");
  $("#ans1").addClass("addClass");
  $("#q2").removeClass("border-dark");
  $("#q2").css("border", "1.5px solid #999999");
  $("#q2").css("background-color", "#FFFFFF");
  $("#q2").css("color","#C2C2C2");
  $("#ans2").removeClass("border-dark");
  $("#ans2").css("border", "1.5px solid #999999");
  $("#ans2").css("background-color", "#FFFFFF");
  $("#ans2").addClass("addClass");
  $("#q3").removeClass("border-dark");
  $("#q3").css("border", "1.5px solid #999999");
  $("#q3").css("background-color", "#FFFFFF");
  $("#q3").css("color","#C2C2C2");
  $("#ans3").removeClass("border-dark");
  $("#ans3").css("border", "1.5px solid #999999");
  $("#ans3").css("background-color", "#FFFFFF");
  $("#ans3").addClass("addClass");
  $("#labelSec").css("color","#C2C2C2");
$("#security").css("background-color","#AC9EDD");  
$("#ansFirst *").attr("disabled", "disabled").off('click');
//document.cookie = "sec=notsecurity";
//window.location.replace("include/settingsCookie.php");


$("#cq1").addClass("border-dark");
  
  $("#cq1").css("background-color", "#FFFFFF");
  $("#cq1").css("color","#6C757D");
  $("#cans1").addClass("border-dark");
  $("#cans1").css("background-color", "#FFFFFF");
  $("#cans1").removeClass("addClass");
  $("#cq2").addClass("border-dark");
  
  $("#cq2").css("background-color", "#FFFFFF");
  $("#cq2").css("color","#6C757D");
  $("#cans2").addClass("border-dark");
  
  $("#cans2").css("background-color", "#FFFFFF");
  $("#cans2").removeClass("addClass");
  $("#cq3").addClass("border-dark");
  
  $("#cq3").css("background-color", "#FFFFFF");
  $("#cq3").css("color","#6C757D");
  $("#cans3").addClass("border-dark");
  
  $("#cans3").css("background-color", "#FFFFFF");
  $("#cans3").removeClass("addClass");
  $("#labelSec2").css("color","#6C757D");
$("#csecurity").css("background-color","#2B20AE");  
$("#ansFirst2 *").attr("disabled", "disabled").off('click');


$("#ansFirst2 *").removeAttr("disabled");



</script>
<?php } ?>

<?php if(isset($_POST['csecurity']) && count($errorsSave) === 0 ){ ?>
<script>
$("#cq1").removeClass("border-dark");
  $("#cq1").css("border", "1.5px solid #999999");
  $("#cq1").css("background-color", "#FFFFFF");
  $("#cq1").css("color","#C2C2C2");
  $("#cans1").removeClass("border-dark");
  $("#cans1").css("border", "1.5px solid #999999");
  $("#cans1").css("background-color", "#FFFFFF");
  $("#cans1").addClass("addClass");
  $("#cq2").removeClass("border-dark");
  $("#cq2").css("border", "1.5px solid #999999");
  $("#cq2").css("background-color", "#FFFFFF");
  $("#cq2").css("color","#C2C2C2");
  $("#cans2").removeClass("border-dark");
  $("#cans2").css("border", "1.5px solid #999999");
  $("#cans2").css("background-color", "#FFFFFF");
  $("#cans2").addClass("addClass");
  $("#cq3").removeClass("border-dark");
  $("#cq3").css("border", "1.5px solid #999999");
  $("#cq3").css("background-color", "#FFFFFF");
  $("#cq3").css("color","#C2C2C2");
  $("#cans3").removeClass("border-dark");
  $("#cans3").css("border", "1.5px solid #999999");
  $("#cans3").css("background-color", "#FFFFFF");
  $("#cans3").addClass("addClass");
  $("#labelSec2").css("color","#C2C2C2");
$("#csecurity").css("background-color","#AC9EDD");  
$("#ansFirst2 *").attr("disabled", "disabled").off('click');
//document.cookie = "sec=notsecurity";
//window.location.replace("include/settingsCookie.php");


$("#q1").addClass("border-dark");
  
  $("#q1").css("background-color", "#FFFFFF");
  $("#q1").css("color","#6C757D");
  $("#ans1").addClass("border-dark");
  $("#ans1").css("background-color", "#FFFFFF");
  $("#ans1").removeClass("addClass");
  $("#q2").addClass("border-dark");
  
  $("#q2").css("background-color", "#FFFFFF");
  $("#q2").css("color","#6C757D");
  $("#ans2").addClass("border-dark");
  
  $("#ans2").css("background-color", "#FFFFFF");
  $("#ans2").removeClass("addClass");
  $("#q3").addClass("border-dark");
  
  $("#q3").css("background-color", "#FFFFFF");
  $("#q3").css("color","#6C757D");
  $("#ans3").addClass("border-dark");
  
  $("#ans3").css("background-color", "#FFFFFF");
  $("#ans3").removeClass("addClass");
  $("#labelSec").css("color","black");
$("#security").css("background-color","#2B20AE");  
$("#ansFirst *").attr("disabled", "disabled").off('click');


$("#ansFirst *").removeAttr("disabled");

document.getElementById('verifyEmailCode').scrollIntoView();


document.cookie = "sec=notsecurity; path=/settings.php";


</script>
<?php } ?>

<?php if(count($errorsPass) === 0 && isset($_POST['savePass'])){ ?>
<script>
   document.cookie = "clues=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";


</script>
<?php } ?>
<script>
$('.labelName2').css("color","#808080");
 $("#verifyEmail").addClass("addClass");
 $("#verifyEmail").removeClass("border-dark");

 $("#verifyEmail").css("border", "1.5px solid #999999");

 $("#verifySaveEmail").css("background-color","#9786D5"); 
$('.verifyEmailStyle *').attr("disabled","disabled").off('click');



$("#label2").css("color","#808080");
 $("#verifyPhone").addClass("addClass");
 $("#verifyPhone").removeClass("border-dark");

 $("#verifyPhone").css("border", "1.5px solid #999999");

 $("#verifySavePhone").css("background-color","#9786D5"); 
$('.verifyPhoneStyle *').attr("disabled","disabled").off('click');

</script>
<?php if($_COOKIE['verifyEmail'] === "true"){ ?>

<script>




$('.labelName2').css("color","#808080");
 $("#verifyEmail").addClass("addClass");
 $("#verifyEmail").removeClass("border-dark");

 $("#verifyEmail").css("border", "1.5px solid #999999");
 $('.resendEmail').css("opacity", "0.5");

 $("#verifySaveEmail").css("background-color","#9786D5"); 
$('.verifyEmailStyle *').attr("disabled","disabled").off('click');



</script>
<?php } ?>

<?php if($_COOKIE['verifyEmail'] === "false"){ ?>
<script>
$('.labelNameEmail').css("color","#808080");
$("#oldEmail").addClass("addClass");
 $("#oldEmail").removeClass("border-dark");
$("#oldEmail").css("border", "1.5px solid #999999");

$("#newEmail").addClass("addClass");
 $("#newEmail").removeClass("border-dark");
$("#newEmail").css("border", "1.5px solid #999999");

$("#pass1").addClass("addClass");
 $("#pass1").removeClass("border-dark");
$("#pass1").css("border", "1.5px solid #999999");

$("#saveEmail").css("background-color","#9786D5");

$('.forEmail *').attr("disabled","disabled").off('click');


$('.labelName2').css("color","black");
 $("#verifyEmail").removeClass("addClass");
 $("#verifyEmail").addClass("border-dark");
$('.resendEmail').css("opacity", "1");
 $("#verifySaveEmail").css("background-color","#2B20AE"); 
 document.getElementById('forEmail').scrollIntoView();

$('.verifyEmailStyle *').removeAttr("disabled");


</script>
<?php } ?>

<?php if($_COOKIE['verifyPhone'] === "false"){ ?>
<script>
$("#label2").css("color","#808080");
$("#oldPhone").addClass("addClass");
 $("#oldPhone").removeClass("border-dark");
$("#oldPhone").css("border", "1.5px solid #999999");

$("#newPhone").addClass("addClass");
 $("#newPhone").removeClass("border-dark");
$("#newPhone").css("border", "1.5px solid #999999");

$("#cnewPhone").addClass("addClass");
 $("#cnewPhone").removeClass("border-dark");
$("#cnewPhone").css("border", "1.5px solid #999999");

$("#savePhone").css("background-color","#9786D5");

$('.forPhone *').attr("disabled","disabled").off('click');


$("#label2").css("color","black");
 $("#verifyPhone").removeClass("addClass");
 $("#verifyPhone").addClass("border-dark");
 $('.resendPhone').css("opacity", "1");

 $("#verifySavePhone").css("background-color","#2B20AE"); 
 document.getElementById('forPhone').scrollIntoView();

$('.verifyPhoneStyle *').removeAttr("disabled");


</script>
<?php } ?>

<?php if($_COOKIE['verifyPhone'] === "true"){ ?>

<script>

  
$("#label2").css("color","#808080");
 $("#verifyPhone").addClass("addClass");
 $("#verifyPhone").removeClass("border-dark");

 $("#verifyPhone").css("border", "1.5px solid #999999");
 $('.resendEmail').css("opacity", "0.5");

 $("#verifySavePhone").css("background-color","#9786D5"); 
$('.verifyPhoneStyle *').attr("disabled","disabled").off('click');



</script>
<?php } ?>



<?php if(isset($_POST['saveEmail']) && count($errorsEmail) === 0){ ?>
<script>

charset = '0123456789',
randomP = '';

for(var i=0; i<6; i++){

    var randnum = Math.floor(Math.random() * charset.length);
    randomP += charset.substring(randnum, randnum +1);

}
document.getElementById("v1").value = randomP;


console.log(randomP);



</script>
<?php } ?>

<script>

charset = '0123456789',
randomP = '';

for(var i=0; i<6; i++){

    var randnum = Math.floor(Math.random() * charset.length);
    randomP += charset.substring(randnum, randnum +1);

}
document.getElementById("v2").value = randomP;


console.log(randomP);

</script>




<?php if(isset($_POST['savePhone']) && count($errorPhone) === 0){ ?>
<script>
$("#label2").css("color","black");
 $("#verifyPhone").removeClass("addClass");
 $("#verifyPhone").addClass("border-dark");

 $("#verifySavePhone").css("background-color","#2B20AE"); 

$('.verifyPhoneStyle *').removeAttr("disabled");

$('.labelNamePhone').css("color","#808080");
$("#oldPhone").addClass("addClass");
 $("#oldPhone").removeClass("border-dark");
$("#oldPhone").css("border", "1.5px solid #999999");

$("#oldPhone").addClass("addClass");
 $("#oldPhone").removeClass("border-dark");
$("#oldPhone").css("border", "1.5px solid #999999");

$("#newPhone").addClass("addClass");
 $("#newPhone").removeClass("border-dark");
$("#newPhone").css("border", "1.5px solid #999999");

$("#cnewPhone").addClass("addClass");
 $("#cnewPhone").removeClass("border-dark");
$("#cnewPhone").css("border", "1.5px solid #999999");

$("#savePhone").css("background-color","#9786D5");

$('.forPhone *').attr("disabled","disabled").off('click');






</script>
<?php } ?>

<?php if(isset($_POST['saveEmail'])){ ?>
<script>
 document.getElementById('forEmail').scrollIntoView();


</script>
<?php } ?>

<?php if(isset($_POST['savePhone'])){ ?>
<script>
 document.getElementById('forPhone').scrollIntoView();


</script>
<?php } ?>


<?php if(isset($_POST['savePass'])){ ?>
<script>
 document.getElementById('forPass').scrollIntoView();


</script>
<?php } ?>



<?php if(isset($_POST['security'])){ ?>
<script>
 document.getElementById('ansFirst').scrollIntoView();


</script>
<?php } ?>

<?php if(isset($_POST['csecurity'])){ ?>
<script>
 document.getElementById('ansFirst2').scrollIntoView();


</script>
<?php } ?>

<?php if(isset($_POST['csecurity']) && count($errorsSave) === 0 ){ ?>

<script>
$(document).scrollTop(0);
</script>
<?php } ?>


</body>

</html>