<?php require_once('include/function.php'); 
$email = $_GET['Email'];


if(isset($_POST['resend'])){
    updateVerification(getUser($email)['myId'], $_POST['v1']);
    header('location: include/sendtoGmail0.php?Email='.$email.'&Device='.$_GET['Device']);
 
}

if($_COOKIE['isreload2'] === "true" ){
  updateVerify(getUser($email)['myId']);
 forDevice($_POST, $email);
 header('location:index.php');

}

/*
$errors = [];
    if(isset($_POST['verify1'])){
        $errors = verifyEmail($_POST, $email);
      if(count($errors)===0){
        forDevice($_POST, $email);
      //  $user = getUser($email);
      //  $_SESSION[USER_SESSION_KEY] = $user;
        header('location:index.php');
      }
      
    }

*/


?>



<!DOCTYPE html>
<html lang="en">
<head>		
<?php require_once('include/header.php'); ?>


    <title>Verify Account</title>

	<!-- Styles -->
<style>
.time{
    outline: none;
    position: absolute;
    background-color: transparent;
    color:  #736A6A;
    margin-left: -114px;
    margin-top: -3px;
    font-size: 19.8px;
}
.resendcustom:focus{
outline: none;

}
.code{
margin-left: 10px;

}
.space3{
    margin-left: 65px;
}
.error{
margin-left: 65px;
width: 300px;


}

.error0{
    display: none;
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
            &nbsp;&emsp;&nbsp;&emsp;About Me
                    </div>
                    <p> </p>
                    <?php if(getUser($_GET['Email'])['device_id'] != $_GET['Device']  && getUser($email)['ip_address'] != myIp() && getUser($_GET['Email'])['isVerified'] != '0'){ ?>
                <p class = "text-center changeDevice"> Hi, your modem, router, browser, or location has been changed, and your device as well. You will need to input a verification code.</p>
            <?php } else if(getUser($email)['ip_address'] != myIp() && getUser($_GET['Email'])['isVerified'] != '0') { ?>
                <p class = "text-center changeDevice"> Hi, your modem, router, or location has been changed, you will need to input a verification code.</p>
            <?php } else if( getUser($email)['device_id'] != $_GET['Device'] && getUser($_GET['Email'])['isVerified'] != '0' ) {?>
                <p class = "text-center changeDevice"> Hi, your device or your browser has been changed, you will need to input a verification code.</p>
                
            <?php } ?>
                    <p class ="register">&nbsp;&nbsp;&emsp;&emsp;&nbsp;&emsp;&emsp;Check your email and enter the 6-digit</p>
                    <br>
                    <form id = "registration" class = "val" method="post">
                    <input type = "hidden" id = "emailSend" name = "emailSend" class = "emailSend" value="<?php echo $email; ?>" readonly/>
                    <input type = "hidden" id = "myCode" name = "myCode" value="<?php echo getVerify(getUser($email)['myId'])['code']; ?>" readonly/>
                    <input type = "hidden" id = "v1" name = "v1" readonly/>
                    <input type = "hidden" id = "confirmv1" name = "confirmv1" value="" readonly/>
                    <input type = "hidden" id = "device_id" name = "device_id" value="" readonly/>
                    <input type = "hidden" id ="icopy" readonly/>

                    

    <div class="code-box space3">
    
        <input type ="number" name = "code" id ="b1" class="text-center code">
        <input type ="number" name = "code" id ="b2" class="text-center code">
        <input type ="number" name = "code" id ="b3" class="text-center code">
        <input type ="number" name = "code" id ="b4" class="text-center code">
        <input type ="number" name = "code" id ="b5" class="text-center code">
        <input type ="number" name = "code" id ="b6" class="text-center code">

        <input type ="number" name = "code2" id ="a1" class="text-center code">
        <input type ="number" name = "code2" id ="a2" class="text-center code">
        <input type ="number" name = "code2" id ="a3" class="text-center code">
        <input type ="number" name = "code2" id ="a4" class="text-center code">
        <input type ="number" name = "code2" id ="a5" class="text-center code">
        <input type ="number" name = "code2" id ="a6" class="text-center code">
    </div>

    <div class ="error">
                    <p type = "text" id = "errorCode" class ="text-danger error0"> Lack of numbers, you must input 6  numbers</p>
                    <p type = "text" id = "error2Code" class ="text-danger error0">Your verification code is not matched</p>
                    </div>


    <p> <span class="space1"></span></p>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
    
    <button name = "resend" id = "resend" class ="resendcustom">Resend Code</button>
    <input type = "hidden" class = "time border-0" id = "time" name = "time" readonly/>

    <br>
    <br>
    <br>
    <br>
   
&nbsp;&emsp;&emsp;&nbsp;&emsp;&emsp;<button type="button" class="btn btn-primary rounded-0 mycustombtn" id = "verify1" name="verify1" value="verify">Submit</button>

<?php displayError($errors, 'confirmv1'); ?>
<div class ="d-flex">
  
    &nbsp;&emsp;&emsp;&nbsp;&emsp;&emsp;<p class ="register1">Logging into another account?</p>&nbsp; <a href="login.php" id ="login"  class="register">Sign in</a>

</div>
</form>

</div>

</div>

</div>
<div class="col">
    </div>

</div>



</div>


     <!-- Scripts -->

     


<script>

document.getElementById('a1').style.display = 'none';
document.getElementById('a2').style.display = 'none';
document.getElementById('a3').style.display = 'none';
document.getElementById('a4').style.display = 'none';
document.getElementById('a5').style.display = 'none';
document.getElementById('a6').style.display = 'none';



     $(document).ready(function(){





charset = '0123456789',
randomP = '';

for(var i=0; i<6; i++){

  var randnum = Math.floor(Math.random() * charset.length);
  randomP += charset.substring(randnum, randnum +1);

}
document.getElementById("v1").value = randomP;


console.log(randomP);






 // $('[name="code2"]').attr('disabled','disabled');
 // $('[name="code2"]').hide();
// document.getElementsByName("code2").style.display = "none";



var codes = document.querySelectorAll('.code');

codes[0].focus();

codes.forEach((code, index) => {
  code.addEventListener('keydown', (e) => {

      if(e.key >= 0 && e.key <= 9){
          codes[index].value = '';
          setTimeout(() => codes[index + 1].focus(), 20);
          
          
      }
      else if(e.key === 'Backspace'){
        codes[index].value = '';
          setTimeout(() => codes[index - 1].focus(), 20);
      }
      
      
  });

});




//for(var i=1; i<=6; i++){
$('[name="code"]').on('paste', function (e) {
 // $('[name="code"]').attr('disabled','disabled');
 $('[name="code"]').hide();
// $('[name="code"]').removeAttr('id');
$('[name="code"]').val("");
// $("#a"+i).attr('id','a'+i);


$('[name="code2"]').show();




  if (e.originalEvent.clipboardData) {
      var text = e.originalEvent.clipboardData.getData("text/plain");
    //  $("#a1").empty();

    //  $('#icopy').empty();
     // $('#icopy').append(text);
     $('#icopy').val(text);
     console.log($('#icopy').val());
   
     arr = Array.from($('#icopy').val());
    // document.getElementById('a'+(i)).value = arr[i-1];
  
console.log(arr);

for(var i =0; i<arr.length; i++){

if(arr.length === 0){
   document.getElementById('a'+(i+1)).value = "";
}
else if(arr[i].match(/[A-Z][a-z]*/gi)){
document.getElementById('a'+(i+1)).value = "";
}
else{
   document.getElementById('a'+(i+1)).value = arr[i];
}

}
     

  }
  
});
//}


/*
// keyboard 
for(let i=0; i<6; i++){
$('#a'+(i+1)).on('keydown keyup keypress tap taphold', function () {
  
     // $('#icopy').empty();
     // $('#icopy').append(text);
     arr = Array.from($('#icopy').val());
     if($('#a'+(i+1)).val().length === 0){
      $('#a'+(i+1)).val("");
     }
     else{
      $('#a'+(i+1)).val(arr[i]);
     }
});
}
*/



$('[name="code2"]').on('paste', function (e) {

$('[name="code2"]').hide();
//$('[name="code2"]').removeAttr('id');
$('[name="code2"]').val("");
// $("#a"+i).attr('id','a'+i);


$('[name="code"]').show();






if (e.originalEvent.clipboardData) {
   var text = e.originalEvent.clipboardData.getData("text/plain");
 //  $("#a1").empty();

 //  $('#icopy').empty();
  // $('#icopy').append(text);
  $('#icopy').val(text);
  console.log($('#icopy').val());

  arr = Array.from($('#icopy').val());
 // document.getElementById('a'+(i)).value = arr[i-1];

console.log(arr);

for(var i =0; i<arr.length; i++){

if(arr.length === 0){
document.getElementById('b'+(i+1)).value = "";
}
else if(arr[i].match(/[A-Z][a-z]*/gi)){
document.getElementById('b'+(i+1)).value = "";
}
else{
document.getElementById('b'+(i+1)).value = arr[i];
}

}
  

}

});




$("#verify1").click(function(){
  let myCodes = $("#a1").val() + $("#a2").val() + $("#a3").val() + $("#a4").val() + $("#a5").val() + $("#a6").val() + $("#b1").val() + $("#b2").val() + $("#b3").val() + $("#b4").val() + $("#b5").val() + $("#b6").val();

if(myCodes.length != 6){
$("#error2Code").hide();
$("#errorCode").show();
}
else if(myCodes != $("#myCode").val()){
$("#errorCode").hide();
$("#error2Code").show();

}
else{
$("#errorCode").hide();
$("#error2Code").hide();

document.cookie = "isreload2=true; path=/verifyEmail.php";
this.form.submit();


}


  
console.log(myCodes);
});












});






</script>

<script>


$("#resend").attr("disabled","disabled");

$("#time").attr("type","text");

let t = document.getElementById("time");

for(let x =0, i=30; x < 30; x++,i--){
  setTimeout(function(){ 
      t.value = i 
      //document.cookie = "time="+i; 
      }, 0+1000*(x));
 
}

setTimeout(() => {
 
$("#resend").removeAttr("disabled");


      $("#time").attr("type","hidden");

     //document.getElementById("x").value =0;

  }, 30000);

</script>

<?php if(isset($_POST['resend'])){ ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">



$("#resend").attr("disabled","disabled");
$("#time").attr("type","text");
let t = document.getElementById("time");

for(let x =0, i=30; x < 30; x++,i--){
  setTimeout(function(){ t.value = i }, 0+1000*(x));
 
}

setTimeout(() => {

$("#resend").removeAttr("disabled");

  
      $("#time").attr("type","hidden");


  }, 30000);
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

console.log(document.getElementById('emailSend').value);
console.log(document.getElementById('myCode').value);
*/
</script>
<?php } ?>







</body>  
</html>