<?php require_once('include/function.php'); ?>
<?php

$email = $_GET['forgotEmail'];

$user = getUser($email);

if(strtolower($user['question_one']) != strtolower($_GET['q1']) || strtolower($user['answer_one']) != strtolower($_GET['ans1']) || strtolower($user['question_two']) != strtolower($_GET['q2']) || strtolower($user['answer_two']) != strtolower($_GET['ans2']) || strtolower($user['question_three']) != strtolower($_GET['q3']) || strtolower($user['answer_three']) != strtolower($_GET['ans3'])){
header('location: login.php');

}



if(isset($_POST['send'])){

if($_POST['radio'] === "radEmail"){
    updateVerification(getUser($email)['myId'], $_POST['v1']); 
header('location: include/sendtoGmail2.php?Email='.$email.'&Device='.$_POST['device_id'].'&q1='.$_GET['q1'].'&ans1='.$_GET['ans1'].'&q2='.$_GET['q2'].'&ans2='.$_GET['ans2'].'&q3='.$_GET['q3'].'&ans3='.$_GET['ans3']);

}

if($_POST['radio'] === "radPhone"){
    forVerification2($_POST, $email);
    header('location: include/sendtoPhone.php?Email='.$email.'&q1='.$_GET['q1'].'&ans1='.$_GET['ans1'].'&q2='.$_GET['q2'].'&ans2='.$_GET['ans2'].'&q3='.$_GET['q3'].'&ans3='.$_GET['ans3']);
    
    }


}



?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    <link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>

    <style>

.line{
    border-color: black;
    width: 100px;
    margin-right: 20px;
}
.line2{
    border-color: black;
    width: 100px;
    margin-left: 20px;
}

.orLabel{
    font-size: 20px;
}
.securityLabel{
    font-size: 23px;
margin-left: 79px;
margin-top: -10px;
font-family: 'Poiret One';
color: #3507B2;
font-weight: 600;

}

.space{
    margin-top: -17px;
}

.login:read-only{
background-color: transparent;
color: black;


}


.login{

width: 300px;
border: .1px solid rgb(0, 0, 0);
border-top: none;
margin: auto;

}

.radButton{
    -ms-transform: scale(1.8); /* IE 9 */
    -webkit-transform: scale(1.8); /* Chrome, Safari, Opera */
    transform: scale(1.8);
    margin-left: 16px;
    margin-top: 45px;
   
}
.inputs{
    margin-left: -9px;
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




  <div class = "container" id = "con">



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
                <br>
                
                <div class="panelhead">
                &nbsp;&nbsp;&nbsp;&emsp;&emsp;Forgot Password
                    </div>
                    <br>
                	<form id = "registration" class = "val" method="post">
                    <input type = "hidden" id = "v1" name = "v1" value="" readonly/>
                    <input type = "hidden" id = "device_id" name = "device_id" value="" readonly/>


                    <p class ="securityLabel">Email Verification</p>
<p class= "space"> </p>



<div class ="container d-flex radio">
                    <input type="radio" id ="radEmail" class ="radButton" name="radio" value ="radEmail" checked>
                        <div class="form-group d-flex justify-content-center inputs">
                        
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Email</label>
                    	<input type = "text" id = "email" class = "form-control rounded-0 login" name = "email" value="<?php echo getUser($email)['email']; ?>" readonly/>
                        
                       
                        
                    </div>
                        </div>
            
</div>



                      



                    <div class="d-flex">
<hr class ="line">
<p class = "orLabel">or</p>
<hr class ="line2">
</div>

<p class ="securityLabel">Phone Verification</p>
<p class= "space"> </p>



<div class ="container d-flex radio">
                    <input type="radio" id = "radPhone" class ="radButton" name="radio" value ="radPhone">
                        <div class="form-group d-flex justify-content-center inputs">
                        
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="num" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Phone Number</label>
                    	<input type = "text" id = "num" class = "form-control rounded-0 login" name = "num" value="<?php echo getUser($email)['phone']; ?>" readonly/>
                        
                       
                        
                    </div>
                        </div>
            
</div>



                        <br>
                                      
                        <div class="form-group d-flex justify-content-center row">
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<button type="submit" class="btn btn-primary rounded-0 mycustombtn" id ="send" name="send">Send Codes</button>
                        <div class ="d-flex">
                        &nbsp;&emsp;&emsp;<p class ="register1">Logging into another account?</p>&nbsp; <a href="login.php"  class="register">Sign in</a>
</div>
                        </div>
                        </div>

                   
                    </form>
                    
                </div>
                 
            </div>

           
     <!-- </div> --> 

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


charset = '0123456789',
randomP = '';

for(var i=0; i<6; i++){

    var randnum = Math.floor(Math.random() * charset.length);
    randomP += charset.substring(randnum, randnum +1);

}
document.getElementById("v1").value = randomP;





</script>

    
   </body>

</html>