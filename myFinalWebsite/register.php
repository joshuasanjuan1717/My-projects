<?php require_once('include/function.php');
   $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);
        $email = $_POST['email'];
    
        if(count($errors) === 0){
            forVerification($_POST, $email);
        header('location: include/sendtoGmail0.php?Email='.$email.'&Device='.$_POST['device_id']);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>    

<style>
.error{
    margin-left: 16px;
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


    <script>
        $(document).ready(function(){


charset = '0123456789',
randomP = '';

for(var i=0; i<6; i++){

    var randnum = Math.floor(Math.random() * charset.length);
    randomP += charset.substring(randnum, randnum +1);

}
document.getElementById("v1").value = randomP;


console.log(randomP);

//  console.log(document.getElementById("myEmail").value);



//  $("#verify1").click(function() {

//a = document.getElementById('a1').value+document.getElementById('a2').value+document.getElementById('a3').value+document.getElementById('a4').value+document.getElementById('a5').value+document.getElementById('a6').value;
//console.log(a);
// document.getElementById("confirmv1").value = a;


//});



});
        </script>

    </head>

    <body class = "con1">
    
    <div class = "container" id = "con">
    <br>
                    <br>
<div class="row">


<div class = "col">

<div class = "row">
    
<div class="container p-3 my-3 bg-white border border-dark form2">
<img src="images/loginLogo.png" class = "logo" alt="logo" style="margin-top: 3px;" width="218" height="40">
<h2 class = "styleCreate">&nbsp;&emsp;&emsp;Create an Account</h2>
<div class = "panel-body">
    <p> </p>

<form id = "registration" class = "d-flex" method="post">
<input type = "hidden" id = "device_id" name = "device_id" value="" readonly/>
<input type = "hidden" id = "v1" name = "v1" value="" readonly/>
<input type = "hidden" id = "myEmail" name = "myEmail" value="<?php echo $_POST['email']; ?>" readonly/>
<input type = "hidden" id = "myCode" name = "myCode" value="<?php echo getVerify($_POST['email'])['code']; ?>" readonly/>
<div class="col">
<div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="name" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Name:</label>
                    	<input type = "text" id = "name" class = "form-control rounded-0 register01" name = "name" placeholder = "Enter Name"
                        <?php displayValue($_POST, 'name'); ?> />
                        <div class ="error">
                        
                        <?php displayError($errors, 'name'); ?>
                        </div>
                    </div>
                        </div>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Email:</label>
                    	<input type = "email" id = "email" class = "form-control rounded-0 register01" name = "email" placeholder = "sampleemail@mail.com"
                        <?php displayValue($_POST, 'email'); ?> />
                        <div class ="error">
                        
                        <?php displayError($errors, 'email'); ?>
                        </div>
                    </div>
                        </div>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="pass" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Master Password:</label>
                    	<input type = "password" id = "pass" class = "form-control rounded-0 register01" name = "pass" placeholder = "onetwothreefourfive" autocomplete="off"
                        <?php displayValue($_POST, 'pass'); ?> />
                    <?php 
                    $errEye = "";
                        if(count($errors) ===0 ){
                                $errEye = "openEye02";
                        }
                        else{
                            $errEye = "openEye2Err";
                        }
                    ?>

                        <img id="openEye" class = "<?php echo $errEye; ?>" src="images/noun-eye-3325381.png" width = "34" height = "20"/>
                         <img id="closeEye" class = "<?php echo $errEye; ?>" src="images/noun-hide-3325178.png" width = "34" height = "20" style = "display: none;"/>
                      <div class = "progressPass" id = "progressPass"> </div> 
                    <p> </p>
                    <div class = "d-flex"> <p class = "strength2">&emsp;Password Strength: </p>&nbsp; <input type = "text" class = "strength" id = "passStrength" readonly/> </div>
                    <div class ="error">
                       
                    <?php displayError($errors, 'pass'); ?>
                    </div>
                    </div>
                        </div>
                              
                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="cpass" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Confirm Master Password:</label>
                    	<input type = "password" id = "cpass" class = "form-control rounded-0 register01" name = "cpass" placeholder = "onetwothreefourfive" autocomplete="off"
                        <?php displayValue($_POST, 'cpass'); ?> />
                        <?php 
                    $errEye2 = "";
                     if(strlen($_POST['pass']) <5 && $_POST['pass'] != $_POST['cpass'] ){
                        $errEye2 = "openEye2Err003";
                        }
                        else if(strlen($_POST['pass']) <5){
                            $errEye2 = "openEye2Err3";
                        }
                        else if(count($errors) ===0){
                                $errEye2 = "openEye2";
                        }
                        else{
                            $errEye2 = "openEye2Err2";
                        }
                    ?>

                        <img id="openEye2" class = "<?php echo $errEye2; ?>" src="images/noun-eye-3325381.png" width = "34" height = "20">
                         <img id="closeEye2" class = "<?php echo $errEye2; ?>" src="images/noun-hide-3325178.png" width = "34" height = "20" style = "display: none;">
                         <div class ="error">
                        
                         <?php displayError($errors, 'cpass'); ?>
                         </div>
                    </div>
                        </div>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="clue" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Password Clues:</label>
                    	<input type = "text" id = "clue" class = "form-control rounded-0 register01" name = "clue" placeholder = "Type Password Clue"
                        <?php displayValue($_POST, 'clue'); ?> />
                        <div class ="error">
                        
                        <?php displayError($errors, 'clue'); ?>
                        </div>
                        <p class ="clue">&emsp;Question or phrases that will help you remember this password</p>
                    </div>
                        </div>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &emsp;<label for="num" id = "fontvalidation" class="col-sm-2 col-form-label register2" >Phone Number:</label>
                    	<input type = "number" id = "num" class = "form-control rounded-0 register01" name = "num" placeholder = "09123456789"
                        <?php displayValue($_POST, 'num'); ?> />
                        <div class ="error">
                       
                        <?php displayError($errors, 'num'); ?>
                        </div>
                    </div>
                        </div>


</div>

<div class="col">
<div class="form-group row  d-flex justify-content-center row">
                        <div class="col-sm-10">

                    <select name="q1" id="q1" class = "form-control border border-dark rounded-0" style="width: 368px;">
                            <option value ="">Security Question 1</option>
                            <option value="pet">What is your favorite pet?</option>
                            <option value="teacher">Who is your first teacher?</option>
                    </select>
                    <?php displayError($errors, 'q1'); ?>
                        </div>

</div>

<div class="form-group row  d-flex justify-content-center row">
                        <div class="col-sm-10">
                        <input type = "text" id = "ans1" class = "form-control  rounded-0 border border-dark" style = "width: 368px" name = "ans1" placeholder = "Answer"
                         />
                         <?php displayError($errors, 'ans1'); ?>
                    </div>

</div>
<br>

<div class="form-group row  d-flex justify-content-center row">
                       
                        <div class="col-sm-10">

                    <select name="q2" id="q2" class = "form-control  rounded-0 border border-dark" style = "width: 368px">
                    <option value ="">Security Question 2</option>
                            <option value="sport">What is your favorite sport?</option>
                            <option value="color">What is your favorite color?</option>
                    </select>
                    <?php displayError($errors, 'q2'); ?>
                        </div> 
                    </div>


                    <div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">
                        <input type = "text" id = "ans2" class = "form-control  rounded-0 border border-dark" style = "width: 368px" name = "ans2" placeholder = "Answer"
                         />
                         <?php displayError($errors, 'ans2'); ?>
                    </div>

                        </div>
<br>

<div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">

                    <select name="q3" id="q3" class = "form-control  rounded-0 border border-dark" style = "width: 368px">
                    <option value ="">Security Question 3</option>
                            <option value="singer">What is the name of your favorite singer?</option>
                            <option value="study">Where did you study in high school?</option>
                    </select>
                    <?php displayError($errors, 'q3'); ?>
                        </div> 
                    </div>


                    <div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">
                        <input type = "text" id = "ans3" class = "form-control  rounded-0 border border-dark" style = "width: 368px" name = "ans3" placeholder = "Answer"
                         />
                         <?php displayError($errors, 'ans3'); ?>
                    </div>
                        </div>






</div>


</div>
<br>
<p> </p>
<div class = "row">
    <div class = "col text-center">
<button type="submit" class="btn btn-primary rounded-0 mycustombtn" id ="register" name="register" value="register">Submit</button>
<div class ="d-flex">
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<p class ="register1">Already have an account?</p>&nbsp; <a href="login.php"  class="register">Sign in</a>


</form>
</div>

</div>




</div>
</div>
</div>

</div>




</div>

<br>
<a href="support.php" class="supportLink d-flex justify-content-center"><img src="images/support.png" width="27" height="32"/><div class="support">Contact Support</div></a>
<br>
<br>


</div>

<script>
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

$("#openEye2").click( function() {

$("#openEye2").hide();
$("#closeEye2").show();
$("#cpass").attr("type","text");

});

$("#closeEye2").click(function() {
    $("#openEye2").show();
$("#closeEye2").hide();
$("#cpass").attr("type","password");

});

let duplicate = 0, d = 0, isduplicate = "false";

$("#pass").keyup(function(){
//var mypass = $("#pass").val();





let mypass = document.getElementById("pass"), progress = document.getElementById("progressPass"), passStrength = document.getElementById("passStrength");

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
// const myInput = document.getElementById('pass');
 const myInput2 = document.getElementById('cpass');
// myInput.onpaste = e => e.preventDefault();
 myInput2.onpaste = e => e.preventDefault();

}


</script>


</body>

</html>