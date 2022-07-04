<?php require_once('include/function.php'); 

    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);
$myDevices = getDevices();
        $isVerify = getUser($_POST['email'])['isVerified'];
$email = $_POST['email'];
        if(count($errors) === 0){
            if($isVerify === '0'){
                updateVerification(getUser($email)['myId'], $_POST['v1']);
                header('location: include/sendtoGmail0.php?Email='.$email.'&Device='.$_POST['device_id']);
            }
            else if(getUser($_POST['email'])['device_id'] != $_POST['device_id'] || getUser($_POST['email'])['ip_address'] != myIp()){
                $yourDevice ="";

                foreach(getDevices() as $myDevice){
                    if($myDevice['email'] === $_POST['email']) {
                    
                        if($myDevice['device_id'] === $_POST['device_id'] && $myDevice['ip_address'] === myIp()){
                            $yourDevice = "true";
                            break;
                            //setcookie('myEmail', $_POST['email'], time() + (86400 * 30));
                           // header('location: index.php');
                            
                         }
                       
                         }
                
                }
                if($yourDevice === "true"){
                    header('location: index.php');
                }
                else{
                    updateVerification(getUser($email)['myId'], $_POST['v1']);
                    header('location: include/sendtoGmail0.php?Email='.$email.'&Device='.$_POST['device_id']);
                }


            }
            else{
                //setcookie('myEmail', $_POST['email'], time() + (86400 * 30));
                

                header('location: index.php');
            }
   /*         
foreach($myDevices as $myDevice){
    if($myDevice['email'] === $_POST['email']) {
    
        if($myDevice['device_id'] === $_POST['device_id'] && $myDevice['ip_address'] === myIp()){
            //setcookie('myEmail', $_POST['email'], time() + (86400 * 30));
            header('location: index.php');
            
         }
       
         }

}
*/
     
        }
    }
?>
<?php

$attempt = $_POST['attempt'];
if(strlen($_POST['email']) === 0 || strlen($_POST['pass']) === 0){
    $attempt;
}
else if(getUser($_POST['email']) === false || getUser($_POST['email'])['password'] != $_POST['pass'] ){

    $attempt++;


}


?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-215633526-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-215633526-1');
</script>



<style>

.parent{
  position: relative;
}

.clueStyle{
    margin-left: 36px;
    font-size: 14px;
    color: #8800C7;
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
                
                <div class="text-center panelhead">
                    Login to PacketLocket
                    </div>
                    <br>
                	<form id = "registration" class = "val" method="POST">
                    <input type = "hidden" id = "v1" name = "v1" value="" readonly/>
                    <input type = "hidden" id = "device_id" name = "device_id" value="" readonly/>
                    <input type = "hidden" id = "attempt" name = "attempt" value="<?php echo $attempt; ?>" readonly/>


                    <?php foreach(getUsers() as $user){ ?>
    
    <input type ="hidden" name ="clues[]" value ="<?php echo $user['password_clues']; ?>" readonly/>
    <input type ="hidden" name ="emails[]" value ="<?php echo $user['email']; ?>" readonly/>
    
        <?php } ?>

                        <div class="form-group d-flex justify-content-center row">
                    
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="email" id = "fontvalidation" class="col-sm-2 col-form-label login2" >Email:</label>
                    	<input type = "text" id = "email" class = "form-control rounded-0 login1" name = "email" placeholder = "Enter E-mail"
                        <?php displayValue($_POST, 'email'); ?> />
                        <?php displayError($errors, 'email'); ?>
                        
                    </div>
                        </div>
                        
                        <div class="form-group d-flex justify-content-center row">
                   
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<label for="pass" id = "fontvalidation" class="col-sm-2 col-form-label login2">Master Password:</label>
                    	<div class="parent">
                        <input type = "password" id = "pass" class = "form-control rounded-0 login1" name = "pass" placeholder = "Enter Master Password"
                        autocomplete="off" />
                         <img id="openEye" class = "openEye" src="images/noun-eye-3325381.png" width = "34" height = "20">
                         <img id="closeEye" class = "openEye" src="images/noun-hide-3325178.png" width = "34" height = "20" style = "display: none;">
</div>
                        <?php displayError($errors, 'pass'); ?>

                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;<a href="forgotpassword.php" id = "forgot" class="forgot">Forgot Password?</a>
                    <?php if(isset($_POST['login']) && getUser($_POST['email'])['password'] != $_POST['pass'] ){ ?>
                            <p class ="register">&nbsp;&nbsp;&emsp;&emsp;<?php echo getUser($_POST['email'])['password_clues']; ?></p>
                        <?php } else {?>
                            <p id ="clues" class ="clueStyle">Password Clue/s</p>
                        <?php } ?>
                    </div>
                        </div>                  
                        <div class="form-group d-flex justify-content-center row">
                        <div class="col-sm-10">
                        &nbsp;&emsp;&emsp;<button type="submit" class="btn btn-primary rounded-0 mycustombtn" id = "login" name="login" value="login">Login</button>
                        
                        &nbsp;&emsp;&emsp;<input type = "hidden" class = "time text-danger border-0" id = "time2" name = "time2" size="40" style = "outline: none;" readonly/>
                        &nbsp;&emsp;&emsp;<input type = "hidden" class = "time text-danger border-0" id = "time" name = "time" size="40" style = "outline: none;" readonly/>
                        <?php if($attempt === 3) {?>
                            <br>
                            <br>
                        <?php } else{?>

                            <?php }?>
                        <div class ="d-flex">
                        &nbsp;&emsp;&emsp;<p class ="register1">New to PacketLocket?</p>&nbsp; <a href="register.php" id = "register" class="register">Sign Up</a>
                        
                    </div>
                        </div>
                        </div>

                    <!--  <img src = "https://stackoverflow.com/favicon.ico" width="50" height ="50" onerror ="this.onerror = null; this.src = 'images/logo2.png'" /> -->

                    </form>
                    
                </div>
                 
            </div>
            <br>
<a href="support.php" class="supportLink d-flex justify-content-center"><img src="images/support.png" width="27" height="32"/><div class="support">Contact Support</div></a>
<br>
<br>
           
     <!-- </div> --> 


     
    </div>

    <div class="col">
    </div>

  </div>

  

    
</div>



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
/*
//let time = document.getElementById("time").value;
$("#login").click(function() {
    $("#login").attr("disabled","disabled");
    $("#time").attr("type","text");
   let t = document.getElementById("time");

for(let x =0, i=30; x < 30; x++,i--){
    setTimeout(function(){ t.value = i }, 0+1000*(x));
   
}

   //setTimeout(function(){ t.value = 1 }, 1000);
  // setTimeout(function(){ t.value = 2 }, 2000);
   //setTimeout(function(){ t.value = 3 }, 3000);
    setTimeout(() => {
        
        $("#login").removeAttr("disabled");
        $("#time").attr("type","hidden");
       t.value = "";
    }, 30000);

});

*/

<?php if($attempt === 3) { ?>

    $("#email").attr("disabled","disabled");
    $("#pass").attr("disabled","disabled");
    $("#register").css("pointer-events","none");
    $("#login").attr("disabled","disabled");
    $("#forgot").css("pointer-events","none");
    $("#time").attr("type","text");
    $("#time2").attr("type","text");
   let t = document.getElementById("time");

for(let x =0, i=30; x < 30; x++,i--){
    setTimeout(function(){ t.value = "You have to wait "+i + " seconds" }, 0+1000*(x));
   
}
document.getElementById("time2").value = "You have no attempts.";
   //setTimeout(function(){ t.value = 1 }, 1000);
  // setTimeout(function(){ t.value = 2 }, 2000);
   //setTimeout(function(){ t.value = 3 }, 3000);
    setTimeout(() => {
        $("#email").removeAttr("disabled");
        $("#pass").removeAttr("disabled");
       $("#login").removeAttr("disabled");
        $("#register").css("pointer-events", "auto");
       $("#forgot").css("pointer-events", "auto");
        $("#time").attr("type","hidden");
       $("#time2").attr("type","hidden");
       document.getElementById("attempt").value = 0;
      //  window.location.href= 'login.php';



    }, 30000);

<?php } ?>
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


$("#pass").keyup(function(){

if($("#pass").val() != ""){
    var clues = $("input[name='clues[]']")
              .map(function(){return $(this).val();}).get();
    var emails = $("input[name='emails[]']")
              .map(function(){return $(this).val();}).get();


            let isClue = "", myClue ="";

              for(var i =0; i<clues.length; i++){
                   if($("#email").val() === emails[i]){
                        myClue = clues[i];
                        isClue ="true";
                   }

              }

              if(isClue === "true"){
                   $("#clues").text(myClue);
              }
//console.log($("#email").val());




            }
            else if($("#pass").val() === ""){
                $("#clues").text("Password Clue/s");
            }

});


/*
window.onload = () => {
 const myInput = document.getElementById('pass');
 myInput.onpaste = e => e.preventDefault();
}
*/





});


</script>



<?php if(isset($_POST['login']) && count($errors) === 0 && $isVerify === 0 ){ ?>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">
   /*
(function() {
emailjs.init("user_ooyHtHO111H9yqAvJXmnw");
})();

var templateParams = {
    to_name: document.getElementById('emailSend').value,
    from_name: 'Packet-locket',
    message: document.getElementById('myCode').value
  };

  emailjs.send('service_firicly', 'template_2tj0z4c', templateParams)
    .then(function(response) {
      console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
      console.log('FAILED...', error);
    });
*/
</script>
<?php } ?>

<script>
   document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "pass=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "folder=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "website=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "url=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "comment=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";


   document.cookie = "oldEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "newEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass1=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";

   document.cookie = "oldPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "newPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "cnewPhone=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";

   document.cookie = "pass2=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass3=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "pass4=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "clues=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/settings.php";
   document.cookie = "sec=notsecurity; path=/settings.php";
   document.cookie = "verifyEmail=true; path=/settings.php";
   document.cookie = "verifyPhone=true; path=/settings.php";

   //document.cookie = "active=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";


   document.cookie = "isreload2=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/verifyPhone.php";
document.cookie = "isreload2=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/verifyEmail2.php";
document.cookie = "isreload2=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/verifyEmail.php";

</script>
    

   </body>

</html>