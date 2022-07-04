<?php require_once('include/function.php');


$email = $_GET['Email'];

$user = getUser($email);


if(strtolower($user['question_one']) != strtolower($_GET['q1']) || strtolower($user['answer_one']) != strtolower($_GET['ans1']) || strtolower($user['question_two']) != strtolower($_GET['q2']) || strtolower($user['answer_two']) != strtolower($_GET['ans2']) || strtolower($user['question_three']) != strtolower($_GET['q3']) || strtolower($user['answer_three']) != strtolower($_GET['ans3']) || $_GET['Code2'] != getVerify2(getUser($email)['myId'])['code2'] && $_GET['Code'] != getVerify(getUser($email)['myId'])['code'] ){
    header('location: login.php');
    
    }
    
$errors = [];


if(isset($_POST['changepass'])){

if($_POST['email'] === ""){
    $errors['email'] = 'Your email should not be empty';
}
else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false ){
    $errors['email'] = 'Your email is invalid';
}
else if($_POST['email'] != $email){
    $errors['email'] = 'Your email does not match';
}


if($_POST['newPass'] === "" || $_POST['cnewpass'] === ""){
    $errors['newPass'] = 'Your password should not be empty';
}
else if(strlen($_POST['newPass']) < 8){

    $errors['newPass'] = 'Your password must contain at least 8 alphanumber characters';

}
else if($_POST['newPass'] === getUser($email)['password']){
    $errors['newPass'] = 'This is your old password';
}
else if($_POST['newPass'] != $_POST['cnewpass']){
    $errors['newPass'] = 'Your password does not match';

}

if(count($errors) === 0){

    if($_POST['clues'] === ""){
        $_POST['clues'] = getUser($email)['password_clues'];
      }

    editPass($_POST, $email);

   // header('location: login.php');

}


}


if(isset($_POST['skip'])){
    $user = getUser($email);
    $_SESSION[USER_SESSION_KEY] = $user;
    header('location: index.php');
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>		
<?php require_once('include/header.php'); ?>

<style>
.error{
margin-left: 39px;
width: 300px;


}

.openEye{
    position: absolute;
    margin-top: 4px;
    margin-right: -10px;
}
.parent{
    position: relative;
}

.progress{
    margin-top: 11px;
    max-width: 300px !important;
    margin-left: 35px;
    height: 8px;
  background-color: #d8d8d8;

}

.strength02{
margin-top: -10px;
    margin-left: 20px;
    color: black;
}

.strength0{

    width: 150px;
    margin-top: -25px;
    margin-left: 3px;
    font-size: 19px;
    color: black;
    border: none;
    background-color: transparent;
}

.strength0:focus{
    border: none;
    outline: none;

}



#progress::before{
  content: '';
  display: block;
  height: 100%;
  transition: 0.8s all linear;
  
}

#progress.Weak::before{
  
  background-color: #8b1414;
width: 60px;

}


#progress.Weak.Ok::before{
 
  background-color: #d17018;
width: 120px;

}

#progress.Weak.Ok.Good::before{
 
  background-color: #ffcf30;
width: 180px;

}

#progress.Weak.Ok.Good.SlightStrong::before{
  
  background-color: #aad000;
width: 240px;

}

#progress.Weak.Ok.Good.SlightStrong.Strong::before{
 
  background-color: #08cb34;
width: 300px;

}

.skip{
    text-decoration: none;
    font-size: 15px;
    margin-left: 243px;
    
    background-color: transparent;
    border: none;
    color: blue;
}
.skip:focus{
    outline: none;
}

.support{
    margin-left: 7px; 
    margin-top: 7px; 
    color: black;
    font-weight: 600;

}

.supportLink{
    filter: invert(10%) sepia(37%) saturate(7030%) hue-rotate(220deg) brightness(118%) contrast(98%);
}
.supportLink:hover{
    text-decoration: none;
}


</style>


</head>

<body class = "con1">
<div class="container">

<div class="row">
    <div class="col">
    </div>
    <div class="col">



   <!-- <div class = "col-md-6 col-md-offset-3"> -->
                     <br>
                    <br>
                    <br>
        	<div class="container p-3 my-3 bg-white text-black border border-dark form1">
            <div class = "panel-body">
            <img src="images/loginLogo.png" class = "logo" alt="logo" style="margin-top: 3px;" width="218" height="40">
            <p> </p>
            <div class="panelhead">
            &nbsp;&emsp;&nbsp;&emsp;Update Password
                    </div>
                    <p style="font-size: 13.6px; margin-left: 72px; position: absolute; margin-top: -7px; font-weight: 550;">Ownership Verified! Set up a new Master Password </p>
                   <br>
                    <form id = "registration" class = "val" method="post">
                    <p> </p>

                    <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Confirm Email</label>
                    	<div class ="parent">
                        <input type = "text" id = "email" class = "form-control rounded-0 login1" name = "email" placeholder = "Confirm Your Email"
                        <?php displayValue($_POST, 'email'); ?> />
                        <div class ="error">
                        <?php displayError($errors, 'email'); ?>
                            </div>
            
                                      
                        </div>

                        
                    </div>
                        </div>
                            <br>
                        <p> </p>

                    <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="newPass" id = "fontvalidation" class="col-sm-2 col-form-label login2" >New Password</label>
                    	<div class ="parent">
                        <input type = "password" id = "newPass" class = "form-control rounded-0 login1" name = "newPass" placeholder = "Enter Master Password"
                       
                        <?php displayValue($_POST, 'newPass'); ?>  />
                        <img id="openEye" class = "openEye" src="images/noun-eye-3325381.png" width = "34" height = "20"/>
                         <img id="closeEye" class = "openEye" src="images/noun-hide-3325178.png" width = "34" height = "20" style = "display: none;"/>
                                
                        </div>
                        <div class = "progress" id = "progress"> </div> 
                    <p> </p>
                    <div class = "d-flex"> <p class = "strength02">&emsp;Password Strength: </p>&nbsp; <input type = "text" class = "strength0" id = "passStrength" readonly/> </div>
             
                    </div>
                        </div>


                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="cnewpass" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Confirm New Password</label>
                    	<div class ="parent">
                        <input type = "password" id = "cnewpass" class = "form-control rounded-0 login1" name = "cnewpass" placeholder = "Enter Master Password"
                        <?php displayValue($_POST, 'cnewpass'); ?> />
                        
                        <img id="openEye2" class = "openEye" src="images/noun-eye-3325381.png" width = "34" height = "20"/>
                         <img id="closeEye2" class = "openEye" src="images/noun-hide-3325178.png" width = "34" height = "20" style = "display: none;"/>
                                      
                        </div>

                        <div class ="error">
                        <?php displayError($errors, 'newPass'); ?>
                            </div>
                    </div>
                        </div>

   
                        <br>
                          <p> </p>        
                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="clues" id = "fontvalidation" class="col-sm-2 col-form-label login2" >New Master Password Clue (Optional)</label>
                    	<div class ="parent">
                        <input type = "text" id = "clues" class = "form-control rounded-0 login1" name = "clues" placeholder = "Enter Master Password Clue"
                        <?php displayValue($_POST, 'clues'); ?> />
                        
            
                                      
                        </div>

                        
                    </div>
                        </div>

                        <br>

                                      <div class="form-group d-flex justify-content-center row">
                                      <div class="col-sm-10">
                                      &nbsp;&emsp;&emsp;<button type="submit" class="btn btn-primary rounded-0 mycustombtn" name="changepass" value="changepass">Update</button>
                                     <br>
                                      <button type ="submit" name ="skip" class ="skip">Skip for now</button>
                                      <p> </p>
                                      <div class ="d-flex">
                        &nbsp;&emsp;&emsp;<p class ="register1">Logging into another account?</p>&nbsp; <a href="login.php"  class="register">Sign in</a>
</div>
                                      </div>
                                      </div>



   
</form>

</div>

</div>

<br>
<a href="support.php" class="supportLink d-flex justify-content-center"><img src="images/support.png" width="27" height="32"/><div class="support">Contact Support</div></a>
<br>
<br>


</div>
<div class="col">
    </div>

</div>



</div>


<script>

$(document).ready(function(){

$("#openEye").click( function() {

$("#openEye").hide();
$("#closeEye").show();
$("#newPass").attr("type","text");

});

$("#closeEye").click(function() {
    $("#openEye").show();
$("#closeEye").hide();
$("#newPass").attr("type","password");

});

$("#openEye2").click( function() {

$("#openEye2").hide();
$("#closeEye2").show();
$("#cnewpass").attr("type","text");

});

$("#closeEye2").click(function() {
    $("#openEye2").show();
$("#closeEye2").hide();
$("#cnewpass").attr("type","password");

});


let duplicate = 0, d = 0, isduplicate = "false";

$("#newPass").keyup(function(){
//var mypass = $("#pass").val();





let mypass = document.getElementById("newPass"), progress = document.getElementById("progress"), passStrength = document.getElementById("passStrength");

myString =  Array.from(mypass.value);
  // console.log(myString);

  for(let i = 0; i<myString.length; i++){
    if(myString[myString.length-1] === myString[myString.length-2]){
        isduplicate = "true";
        //duplicate++;
        //console.log(duplicate);

    }
    else{
        isduplicate = "false";
    }
    

  }
  if(isduplicate == "true"){
    duplicate++;
  }
  else{
      duplicate = 0;
  }
  console.log(duplicate);

  

  
if(mypass.value.length >4 && mypass.value.match(/[A-Za-z0-9]/g) || mypass.value.length >4 && mypass.value.match(/[!@#$%^&*()_+~`|}{[:;?,./=''"]/g)){
    progress.classList.add('Weak');
    passStrength.value = "Weak";
}
else{
    progress.classList.remove('Weak');
   // passStrength.value = "";
}
if(mypass.value.length >8 && mypass.value.match(/[A-Z]/g) && mypass.value.match(/[a-z]/g) && mypass.value.match(/[0-9]/g)){
    progress.classList.add('Ok');
    passStrength.value = "Ok";
}
else{
    progress.classList.remove('Ok');
   // passStrength.value = "";

}

if(mypass.value.length >8 && mypass.value.match(/[A-Z]/g) && mypass.value.match(/[a-z]/g) && mypass.value.match(/[0-9]/g) && mypass.value.match(/[!@#$%^&*()_+~`|}{[:;?,./=''"]/g) ){
    progress.classList.add('Good');
    passStrength.value = "Good";
}
else{
    progress.classList.remove('Good');
   // passStrength.value = "";

}

if(mypass.value.length >15 && mypass.value.match(/[A-Z]/g) && mypass.value.match(/[a-z]/g) && mypass.value.match(/[0-9]/g) && mypass.value.match(/.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*/g) ){
    progress.classList.add('SlightStrong');
    passStrength.value = "Slightly Strong";
}
else{
    progress.classList.remove('SlightStrong');
  //  passStrength.value = "";

}

if(mypass.value.length >17 && mypass.value.match(/[A-Z]/g) && mypass.value.match(/[a-z]/g) && mypass.value.match(/[0-9]/g) && mypass.value.match(/.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*/g) && duplicate < 2 ){
    
   

    progress.classList.add('Strong');
    passStrength.value = "Strong";
}
else{
    progress.classList.remove('Strong');
 //   passStrength.value = "";

}

if(mypass.value.length === 0){
    passStrength.value = "";
}


});


});


window.onload = () => {
 const myInput = document.getElementById('newPass');
 const myInput2 = document.getElementById('cnewpass');
 myInput.onpaste = e => e.preventDefault();
 myInput2.onpaste = e => e.preventDefault();
}


</script>


<?php if(isset($_POST['changepass']) && count($errors) === 0){ ?>
<script>
alert('Your password has been successfully changed!!! Please login to Packet Locket');
window.location.replace("login.php");
</script>
<?php } ?>

</body>  

</html>