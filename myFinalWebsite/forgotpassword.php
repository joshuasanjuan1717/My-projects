<?php require_once('include/function.php'); ?>
<?php

$errors = [];
if(isset($_POST['next00'])){
    $errors = forgotten($_POST);

    if(count($errors) === 0)
    header('location: forgotpasswordNext.php?forgotEmail='.$_POST['email']);

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
<style>
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
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Email:</label>
                    	<input type = "text" id = "email" class = "form-control rounded-0 login1" name = "email" placeholder = "enterforgotten@mail.com"
                        <?php displayValue($_POST, 'email'); ?> />
                        
                        <?php displayError($errors, 'email'); ?>
                        
                    </div>
                        </div>
                        <br>
                        <br>
                                      
                        <div class="form-group d-flex justify-content-center row">
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<button type="submit" class="btn btn-primary rounded-0 mycustombtn" name="next00" value="next">Next</button>
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