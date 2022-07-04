<?php require_once('function.php');
 
$email = $_GET['Email'];
//header("refresh: 5; url: ../register.php");
$device = $_GET['Device'];
?>

<html>

<body>


<input type = "hidden" id = "emailSend" name = "emailSend" class = "emailSend" value="<?php echo $email; ?>" readonly/>
<input type = "hidden" id = "myCode" name = "myCode" value="<?php echo getVerify(getUser($_GET['Email'])['myId'])['code']; ?>" readonly/>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">

(function() {
emailjs.init("user_ZpTdkyFfPJTvzciacXoHA");
})();

var templateParams = {
    to_name: document.getElementById('emailSend').value,
    from_name: 'Packet-locket',
    message: document.getElementById('myCode').value
    //message: document.getElementById('myCode').value
  };

  emailjs.send('service_eqxrz4r', 'template_qob37ku', templateParams)
    .then(function(response) {
      console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
      console.log('FAILED...', error);
    });

console.log("<?php echo $email; ?>");


setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= '../verifyEmail.php?Email='+ '<?php echo $email; ?>'+'&Device='+'<?php echo $device; ?>';
}, 1000);

</script>






  </body>

</html>