<?php require_once('include/function.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>

<style>
.message{
    width: 300px;
    border: .1px solid rgb(0, 0, 0);
  
  margin: auto;
}

.error{
    color: red;
    font-size: 16px;
    margin-left: 37px;
    display: none;

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
                &nbsp;&nbsp;&nbsp;&emsp;&emsp;Contact Support
                    </div>
                    <br>
                	<form id = "registration" class = "val" method="post">
                    <input type = "hidden" id = "v1" name = "v1" value="" readonly/>
                    <input type = "hidden" id = "device_id" name = "device_id" value="" readonly/>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Email:</label>
                    	<input type = "text" id = "email" class = "form-control rounded-0 login1" name = "email" placeholder = "Email"
                        />
                        <p class="error" id ="errorEmail">Your Email is invalid</p>
                
                        
                    </div>
                        </div>
                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="subject" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Subject:</label>
                    	<input type = "text" id = "subject" class = "form-control rounded-0 login1" name = "subject" placeholder = "Subject"
                        />
                        <p class="error" id ="errorSubject">Please input your Subject</p>
                
                        
                    </div>
                        </div>
<br>
                        <div class="form-group d-flex justify-content-center row">
                    
                    <div class="col-sm-10">
                    
                    <textarea type = "text" id = "message" rows="6" class = "form-control rounded-0 message" name = "message" placeholder = "Message here.."></textarea>
                    <p class="error" id ="errorMessage">Please input your Message</p>
            
                    
                </div>
                    </div>

                        <br>
                        <br>
                                      
                        <div class="form-group d-flex justify-content-center row">
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<button type="button" class="btn btn-primary rounded-0 mycustombtn" name="send" id ="send" value="next">Submit</button>
                        <div class ="d-flex">
                        &nbsp;&emsp;&emsp;<p class ="register1">Logging into another account?</p>&nbsp; <a href="login.php"  class="register">Sign in</a>
</div>
                        </div>
                        </div>

                         
                    </form>
                    
                </div>
                 
            </div>

           
     <!-- </div> --> 


     
    </div>

    <div class="col">
    </div>

  </div>

  

    
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script>
$(document).ready(function(){

$("#send").click(function(){
    let errors ="";

    if($("#email").val().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
    $("#errorEmail").hide();
    
}
else{
    $("#errorEmail").show();
    errors = "error";
}
   
if($("#subject").val().length != 0){
    $("#errorSubject").hide();
    
}
else{
    $("#errorSubject").show();
    errors = "error";
}

if($("#message").val().length != 0){
    $("#errorMessage").hide();
    
}
else{
    $("#errorMessage").show();
    errors = "error";
}


if(errors == ""){
    console.log("success");

    (function() {
emailjs.init("eHI03rRdcMHlOkK-j");
})();

var templateParams = {
    to_name: 'sanjuanjoshuad7127@gmail.com',
    from_name: document.getElementById('email').value,
    subject: document.getElementById('subject').value,
    message: document.getElementById('message').value
    //message: document.getElementById('myCode').value
  };

  emailjs.send('service_4ck67gf', 'template_srwbmuj', templateParams)
    .then(function(response) {
      console.log('SUCCESS!', response.status, response.text);
      alert("Sent successfully. Please wait a few minutes and check your email.");
      window.location.replace("login.php");

    }, function(error) {
      console.log('FAILED...', error);
    });

    
    
}





});


});



</script>


    
   </body>

</html>