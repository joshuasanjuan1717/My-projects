<?php require_once('include/function.php'); ?>
<?php
/*
$errors = [];
if(isset($_POST['next00'])){
    $errors = forgotten($_POST);

    if(count($errors) === 0)
    header('location: forgotpasswordNext.php?forgotEmail='.$_POST['email']);

}
*/
$email = $_GET['forgotEmail'];

$errors = [];
if(isset($_POST['next02'])){
$errors = forgottenNext($_POST, $email);

if(count($errors) === 0)
    header('location: EmailPhone.php?forgotEmail='.$_POST['email'].'&q1='.$_POST['q1'].'&ans1='.$_POST['ans1'].'&q2='.$_POST['q2'].'&ans2='.$_POST['ans2'].'&q3='.$_POST['q3'].'&ans3='.$_POST['ans3']);



}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    <link href='https://fonts.googleapis.com/css?family=Poiret One' rel='stylesheet'>

    <style>

.login1:read-only{
background-color: transparent;
color: black;


}


.questions{

    width: 300px;
    margin-left: 39px;
    border: .1px solid rgb(0, 0, 0);
  border-bottom: none;
  color: black;
  appearance: none;

}

.answers{
    width: 300px;
    margin-left: 39px;
    border: .1px solid rgb(0, 0, 0);
  border-top: none;
  margin-top: -18px;
  

}

.login2{
    color: black;
}



.space{
    margin-top: -17px;
}


.errors{
width: 300px;    
margin-left: 39px;


}
.securityLabel{
    font-size: 23px;
margin-left: 79px;
margin-top: -10px;
font-family: 'Poiret One';
color: #3507B2;
font-weight: 600;

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

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Email</label>
                    	<input type = "text" id = "email" class = "form-control rounded-0 login1" name = "email" value ="<?php echo $email; ?>" readonly/>
                        
                       
                        
                    </div>
                        </div>
                        <br>

<p class ="securityLabel">Security Question </p>
<p class= "space"> </p>
<div class="form-group row  d-flex justify-content-center row">
                        <div class="col-sm-10">

                    <select name="q1" id="q1" class = "form-control rounded-0 questions">
                            <option value ="">Choose Security Question</option>
                            <option value="pet">What is your favorite pet?</option>
                            <option value="teacher">Who is your first teacher?</option>
                    </select>
                    
                        </div>

</div>

<div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">
                        <input type = "text" id = "ans1" class = "form-control  rounded-0 answers" name = "ans1" placeholder = "Answer"
                         />
                         <div class ="errors">
                        <?php displayError($errors, 'q1'); ?>
</div>
                    </div>

                        </div>
                       

                        <div class="form-group row  d-flex justify-content-center row">
                        <div class="col-sm-10">

                    <select name="q2" id="q2" class = "form-control rounded-0 questions">
                            <option value ="">Choose Security Question</option>
                            <option value="sport">What is your favorite sport?</option>
                            <option value="color">What is your favorite color?</option>
                    </select>
                    
                        </div>

                        </div>

                    <div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">
                        <input type = "text" id = "ans2" class = "form-control  rounded-0 answers" name = "ans2" placeholder = "Answer"
                         />
                         <div class ="errors">
                        <?php displayError($errors, 'q2'); ?>
</div>
                    </div>

                        </div>
                        


                        <div class="form-group row  d-flex justify-content-center row">
                        <div class="col-sm-10">

                    <select name="q3" id="q3" class = "form-control rounded-0 questions">
                            <option value ="">Choose Security Question</option>
                            <option value="singer">What is the name of your favorite singer?</option>
                            <option value="study">Where did you study in high school?</option>
                    </select>
                    
                        </div>

</div>

<div class="form-group row  d-flex justify-content-center row">
                        
                        <div class="col-sm-10">
                        <input type = "text" id = "ans3" class = "form-control  rounded-0 answers" name = "ans3" placeholder = "Answer"
                         />
                         <div class ="errors">
                        <?php displayError($errors, 'q3'); ?>
</div>
                    </div>

                        </div>
                        




                        <br>
                                      
                        <div class="form-group d-flex justify-content-center row">
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<button type="submit" class="btn btn-primary rounded-0 mycustombtn" name="next02">Next</button>
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

    
   </body>

</html>