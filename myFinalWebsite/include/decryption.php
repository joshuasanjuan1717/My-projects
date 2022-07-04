<?php require_once 'encryption.php'; ?>


<?php
if(isset($_POST['buttonDecrypt'])){ ?>
<script type='text/javascript'>



</script>

<?php } ?>





<html>

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
.decryption{
    width: 60%;

}

.words{
    font-size: 45px;
    font-family: "Arial", "Helvetica", "sans-serif";
}
.buttonDecrypt{
    height: 100px;
    width: 30%;
    font-size: 30px;
    
}

</style>

</head>
<body>

<div style="font-size: 125; font-weight: 600;">DECRYPT HERE...</div>
<form method="post">
<textarea name="decryption" id = "decryption" class="decryption" rows="20"></textarea>
<br>
<br>
<button class="buttonDecrypt" id = "buttonDecrypt" name ="buttonDecrypt">Decrypt</button>
</form>
<br>
<br>
<br>
<br>
<button style="display: none;" class="buttonDecrypt" id = "copy" name ="copy" onclick="copyToClipboard('#words')">Copy</button>
<br>
<p id ="words" class="words"><?php echo Decrypting($_POST['decryption']); ?></p>

<script>

$(document).ready(function(){

    if($("#words").text().length != 0){
        console.log("t");
        $("#copy").show();

    }



})

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  var copyText2 = document.getElementById("words");
  //alert("You have copied " + $(element).text());
  $temp.remove();
}



</script>




</body>


</html>