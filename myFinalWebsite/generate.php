<?php require_once 'include/auth.php'; ?>
<?php 
$errors = [];
if(isset($_POST['copy'])){

  $errors = forGenerateHistory($_POST);
  
}

$generateHisotories = getGenerateHistory();

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    <link href='https://fonts.googleapis.com/css?family=Quattrocento Sans' rel='stylesheet'>

    
<style>

.historytext{
    margin-left: 20px;
    font-size: 15px;

    white-space: pre-wrap;      
   white-space: -moz-pre-wrap; 
   white-space: -pre-wrap;     
   white-space: -o-pre-wrap;   
   word-wrap: break-word;
  width: 250px;  
  font-weight: 550;

  }
.deleteHistory{
  position: absolute;
  margin-top: -6px;
  margin-left: calc(76% + 50px );
  filter: invert(12%) sepia(58%) saturate(5323%) hue-rotate(344deg) brightness(63%) contrast(117%);
}

.firstLine{
  width: 92%;
  border-color: black;
  border-width: 1.8px;
  margin-left: 20px;
  margin-top: -10px;
}

.copyhistory{
  position: absolute;
  margin-top: -6px;
  margin-left: 76%;
  filter: invert(12%) sepia(64%) saturate(1803%) hue-rotate(188deg) brightness(93%) contrast(103%);
  background-color: transparent;
outline: none;
border-style: none;
border: none;
}

.copyhistory:focus{
  outline: none;
  border: none;

}

.buttonCopy{
  
 
  height: 47px;
    min-width: 43% !important;
    margin-left: -25px;
    border-color: #4020AE;
    background-color: #4020AE;
    border: #4020AE;
    margin-top: 20px;
  margin-left: 14%;
  border-radius: 0px 20px 20px 0px;
  box-shadow: 1px 5px 3px #696969;



}

.buttonCopy:focus{
  outline: none;
  border: none;

}

.parent{
  position: relative;
}
.overflow{
  height: 384px;
  overflow: auto;
 /* margin-right: calc(31% - 120px); */
 width: calc(45% + 220px);
}

.overflow::-webkit-scrollbar {
  width: 5px;
}

.overflow::-webkit-scrollbar-track {
  background: #C4C4C4; 
 
}

.overflow::-webkit-scrollbar-thumb {
  background: black; 
  border-radius: 10px;
}
.overflow::-webkit-scrollbar-thumb:hover {
  background: rgb(65, 65, 65); 
  
}

.testErr{
  color: red;
  outline: none;
  border: transparent;
  width: 500px;
}

.unselectFolder{

text-decoration: none;
font-size: 20px;
color: white;
display: block;
margin-top: -1px;

}
.space4{
margin-bottom: 12px;
}

.columnforGenerate {
  float: left;
  width: 58%;
  padding: 10px;
  
}
.columnforGenerate2 {
  float: left;
  width: 42%;
  padding: 10px;
  
}


.rowforGenerate:after {
  content: "";
  display: table;
  clear: both;
}

.textGenerate{
 
margin-left: -25px;
  width: calc(55% + 250px);
  height: 15%;
color: black;
border: 3px solid black;
border-radius: 17px;
-webkit-touch-callout: none; 
-webkit-user-select: none; 
 -khtml-user-select: none; 
   -moz-user-select: none; 
    -ms-user-select: none; 
        user-select: none; 
        font-weight: 550;
        font-size: 18px;
        box-shadow: 2px 5px 4px #696969;

}

.textGenerate:read-only{
  background-color: transparent;
  -webkit-touch-callout: none; 
-webkit-user-select: none; 
 -khtml-user-select: none; 
   -moz-user-select: none; 
    -ms-user-select: none; 
        user-select: none; 
}

.rangeGenerate{

  -webkit-appearance: none;
  margin-left: -25px;
  width: calc(100% - 163px );
  height: 5px;
  background-color: #C4C4C4;
  outline: none;
  margin-top: 28px;
}

.rangeGenerate::-webkit-slider-thumb {
  -webkit-appearance: none;
 
  width: 15px;
  height: 15px;
  background: black;
  border-radius: 15px;
  
}

.textpassLength{

  
  font-size: 19px;
  font-weight: 530;

}

.generate{
  
    height: 47px;
    min-width: 43% !important;
    margin-left: -25px;
    border-color: #4020AE;
    background-color: #4020AE;
    border: #4020AE;
    margin-top: 20px;
    border-radius: 20px 0px 0px 20px;
    box-shadow: 1px 5px 3px #696969; 
}

.generate:focus{
 
  outline: none;
}
/*
.generate:hover{
  transform: translateY(-5px);
  box-shadow: 2px 5px 7px #696969; 
}
*/
.imgGenerate{
  margin-left: -10px;
margin-top: 8px;
filter: brightness(0) invert(1);

}

.imgCopy{
  margin-left: 10px;
margin-top: 8px;
filter: brightness(0) invert(1);

}


.labelGenerate{
margin-top: 6px;
font-size: 19px;

}

.labelGenerate2{
margin-top: 6px;
font-size: 19px;
}


.generateLength{
  width: 47px;
  height: 38px;
  border: 2px solid black;
  

}

.generateLength:read-only{
  background-color: transparent;
  border: 2px solid black;
}

.checkBox{
  margin-left: -25px;

  border: 1px solid black;
  height: 28px;
  width: 28px;
}

.checked{
  margin-left: -20px;
  margin-top: -28px;
  position: absolute;
display: none;

}

.GenerateLabels{
  margin-left: 20px;
  margin-top: -31px;
font-size: 25px;
font-family: 'Quattrocento Sans';
font-weight: 600;
color: #2B20AE;
}

.copyHistorytext{
margin-left: 20px;
  font-size: 24px;
font-weight: 570;
color: #2B20AE;
}

.clearAlltext{
  color: #903509;
  font-size: 22px;
  margin-left: calc(76% - 160px);
margin-top: 4px;
}
.Range{
  width: calc(55% + 250px);
}
.Length{
  margin-top: 14px;
  position: absolute;
  margin-left: calc(55% + 81px);

}

.generatePic{
  width: 730px;
  height: 770px;
  margin-left: 4%;

}

  </style>
    </head>

    <body>
    <div class="sidenav">
    <div class = "d-flex justify-content-center navTitle">
    <img src="images/homeLogopng.png" style="margin-top: -4px; margin-bottom: 16px;" alt="logo" width="175" height="39">

</div>
  <a href="index.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-packet-2940135.png" class ="navLogo" alt="logo" width="35" height="35">&emsp; Packet</a>
  <a href="generate.php" class = "selectNav"> &nbsp;&nbsp;<img src="images/noun-password-generating-3610319.png" class ="navLogo2" alt="logo" width="35" height="31"> &emsp;Generate Password</a>
  <a href="settings.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-settings-2650508.png" class ="navLogo" alt="logo" width="33" height="27"> &emsp;Settings</a>
  <a href="addAccount.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-add-account-1559194.png" class ="navLogo" alt="logo" width="33" height="29"> &emsp;Add Account</a>
  <a href="folder.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-folder-2803118.png" class ="navLogo" alt="logo" width="32" height="28">&emsp; Folder</a>
  <p class ="space4"> </p>
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
  <a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class = "unselectFolder">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folder['folder_name'] ?></a>
<?php } ?>
<?php } ?>
</div>

<div class="main">
  <br>
  <br>
 
<form id ="generateForm" method = "post">
<input type="hidden" value="<?php date_default_timezone_set('Asia/Manila'); echo date("Y-m-d H:i:s"); ?>" name = "Date" readonly/>
<div class="rowforGenerate">
  <div class="columnforGenerate">
  <div class="form-group justify-content-center row">
                    
                    <div class="col-sm-10">
                  <input type = "text" style="cursor: default;" id = "textGenerate" class = "form-control border-dark text-center textGenerate" name = "textGenerate" readonly/>

                  <p class = "space2"> </p>
                  <div class = "d-flex Range">
                  <input type = "range" min="8" max="40" id = "rangeGenerate" class = "rangeGenerate" name = "rangeGenerate" value = "1"/>
                  <div class ="parent Length">
                    <div class="d-flex">
                  <p class ="textpassLength">Length: </p> &emsp;
                    
                <input type = "text" class = "form-control rounded-0 shadow-none generateLength" id ="generateLength" name = "generateLength" readonly/>
                </div>
              </div> 

              </div>
                  <p class = "space3"> </p>
                  <div class ="d-flex Range">
                  <button type = "button" class ="generate text-white d-flex justify-content-center" id = "generate" name = "generate"><img src="images/noun-regenerate-3502636.png" class = "imgGenerate" width="29" height="24"> <p class ="labelGenerate">&nbsp;&nbsp;Generate</p>
                  </button>
                  <button type = "submit" onclick ="myF()" id ="copy" name = "copy" class = "buttonCopy text-white d-flex justify-content-center"><p class ="labelGenerate2">Copy</p><img src="images/noun-copy-2047774.png" width="33" height="27" class ="imgCopy"/></button>
  </div>
                   
                    <?php displayError($errors, 'textGenerate'); ?>
               <br>
                    <div class ="parent">
                   <div class = "checkBox" id ="bigLettersEmpty"> </div><img src="images/noun-check-1813701.png" width="31" height="25" class ="checked" id = "bigLetters"/> <p class ="GenerateLabels"> QWERTYUI - Uppercase </p>
                </div>
            
                <div class ="parent">
                   <div class = "checkBox" id = "smallLettersEmpty"> </div><img src="images/noun-check-1813701.png" width="31" height="25" class ="checked" id = "smallLetters"/> <p class ="GenerateLabels"> qwertyuiop - Lowercase</p>
                </div>

                <div class ="parent">
                   <div class = "checkBox" id = "numbersEmpty"> </div><img src="images/noun-check-1813701.png" width="31" height="25" class ="checked" id = "numbers"/> <p class ="GenerateLabels"> 1234567890 - Numbers</p>
                </div>
                
           

                <div class ="parent">
                   <div class = "checkBox" id = "specialCharactersEmpty"> </div><img src="images/noun-check-1813701.png" width="31" height="25" class ="checked" id = "specialCharacters"/> <p class ="GenerateLabels"> !@#$%^&*() - Symbols</p>
                </div>

<input type = "hidden" id ="test" readonly/>
<input type = "text" id ="testErr" class ="testErr" readonly/>
<!-- <input type = "text" id ="testErr2" class ="testErr" readonly/> -->

                  </div>
                    </div>
                

  </div>
  <div class="columnforGenerate2">
    <div class ="overflow" id ="overflow">
<div class = "d-flex">
  <p class ="copyHistorytext"> Copy History </p>
<a href="deleteAll.php?email=<?php echo getLoggedInUser()['email']; ?>" class = "clearAlltext">Clear all</a>
</div>
<hr class ="firstLine" />


<?php foreach($generateHisotories as $generateHisotory){ ?>

  <?php if($generateHisotory['myId'] ===  getLoggedInUser()['myId']){ ?>
<div class ="d-flex parent" >
<p id = "<?php echo $generateHisotory['historyId']; ?>" class = "historytext"><?php echo $generateHisotory['generatedPass']; ?></p>
<p style="position: absolute; margin-left: 50%;"><?php $date=date_create($generateHisotory['history_date']); echo date_format($date,"n/d/y");?></p>
<p id = "<?php echo $generateHisotory['historyId']; ?>hidden" style="display: none;"><?php echo $generateHisotory['generatedPass']; ?></p>
<input id = "<?php echo $generateHisotory['historyId']; ?>hidden2" type ="hidden" value="<?php echo $generateHisotory['generatedPass']; ?>" readonly/>

<button type = "button" onclick="copyToClipboard2('#<?php echo $generateHisotory['historyId']; ?>hidden')" class ="copyhistory"><img src="images/noun-copy-2047774.png" width="32" height="26"/></button>
<a href ="deleteHistory.php?id=<?php echo $generateHisotory['historyId']; ?>" class="deleteHistory"> <img src="images/mobile_delete.png" width="24" height="25" class =""/></a>
</div>
<hr class ="firstLine" />

<?php } ?>

<?php } ?>
  </div>

  </div>

</div>

                      </from>
<br>
<div style = "margin-left: 4%; width: 40%; border: 1px solid rgb(0, 0, 0); padding: 1.5%; text-align: justify; text-justify: inter-word;">
<p style ="font-size: 21px; font-weight: 600;">Instruction:</p>
<p>The passwords are generated based on the check lists. You have to click on the generate password and check the boxes before you copy it. If you copy the password, it will be added to the copy history.</p>
  </div>
<br>
<p> </p>
<img src ="images/generatePic.png" class ="generatePic" />
<br>
<br>
<br>
<br>


</div>

<script>
var slider = document.getElementById("rangeGenerate");
var output = document.getElementById("generateLength");
output.innerHTML = slider.value;
output.value = 8;
slider.oninput = function() {
  output.value = this.value;
}

onInactive(60000, function () {
 // alert('Inactive for 5 seconds');
 window.location.href = "include/Logout.php";
});

function onInactive(ms, cb) {

  var wait = setTimeout(cb, ms);

  document.onmousemove = document.onmousedown = document.onmouseup = document.onkeydown = document.onkeyup = document.onscroll = document.focus = function () {
      clearTimeout(wait);

      //reset timer
      wait = setTimeout(cb, ms);

  };
}




function checkLoginStatus(){
     $.get("include/check.php", function(data){
        if(!data) {
            window.location.replace("include/Logout.php");
        }
        setTimeout(function(){  checkLoginStatus(); }, 1); 
        });
}
checkLoginStatus();


$(document).ready(function(){

 

  var charset1 = '', charset2 = '', charset3 = '', charset4 = '';
	

//big
  $("#bigLettersEmpty").click( function() {
$("#bigLetters").show();
charset1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

});

$("#bigLetters").click( function() {
$("#bigLetters").hide();
charset1 = '';

});

//small
$("#smallLettersEmpty").click( function() {
$("#smallLetters").show();
charset2 = 'abcdefghijklmnopqrstuvwxyz';

});

$("#smallLetters").click( function() {
$("#smallLetters").hide();
charset2 = '';
});

//numbers
$("#numbersEmpty").click( function() {
$("#numbers").show();
charset3 = '0123456789012345678901234';

});

$("#numbers").click( function() {
$("#numbers").hide();
charset3 = '';
});


//special characters
$("#specialCharactersEmpty").click( function() {
$("#specialCharacters").show();
charset4 = '!@#$%^*&()_+~`|}{[]:;?,./-=';

});

$("#specialCharacters").click( function() {
$("#specialCharacters").hide();
charset4 = '';
});
 

$('#generate').mouseup(function(){
  //$(this).css("transform", "translateY(-5px)");
  $(this).css("transform","translateY(-5px)");
  $(this).css("box-shadow","2px 7px 6px #696969");
 //  $(this).css("box-shadow","1px 5px 3px #696969");
    
});

$('#generate').mousedown(function(){
  //$(this).css("transform", "translateY(0px)");
  $(this).css("transform","translateY(0px)");
    $(this).css("box-shadow","0px 0px");;
   
});

$('#generate').hover(function(){
  $(this).css("transform","translateY(-5px)");
  $(this).css("box-shadow","2px 7px 6px #696969");
},
function(){
  $(this).css("transform","translateY(0px)");
  $(this).css("box-shadow","1px 5px 3px #696969");
}

);


$('#copy').mouseup(function(){
  //$(this).css("transform", "translateY(-5px)");
  $(this).css("transform","translateY(-5px)");
  $(this).css("box-shadow","2px 7px 6px #696969");
 //  $(this).css("box-shadow","1px 5px 3px #696969");
    
});

$('#copy').mousedown(function(){
  //$(this).css("transform", "translateY(0px)");
  $(this).css("transform","translateY(0px)");
    $(this).css("box-shadow","0px 0px");;
   
});

$('#copy').hover(function(){
  $(this).css("transform","translateY(-5px)");
  $(this).css("box-shadow","2px 7px 6px #696969");
},
function(){
  $(this).css("transform","translateY(0px)");
  $(this).css("box-shadow","1px 5px 3px #696969");
}

);



form = document.getElementById('generateForm');
form.onsubmit = (e)=>{
    e.preventDefault();


}

$("#copy").click(function(){
  var inputs = $("#generateForm").serialize();
var charsets = $("#test").val();

var passL = $('#generateLength').val();

if(passL <=5){
$("#testErr").val("You must first check the box and generate");
//$("#testErr2").val("length value must be larger than 5");


}

if(passL > 5 && charsets.length ===0){
  $("#testErr").val("You must first check the box and generate");
//$("#testErr2").val("length value must be larger than 5");


}
else if(passL >5){
  $("#testErr").val("");
//$("#testErr2").val("");




$.ajax({
    type: "POST",
    url: "ajax/insertGenerate.php",
    data: inputs,
    success: function(){
      //  $('.scroll').empty();
        $("#textGenerate").val("");
        
        $("#test").val("");

     // return false;
    }




});







function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
}


    var copyText = document.getElementById("textGenerate");
    copyToClipboard(copyText.value);
    alert("You have copied " + copyText.value);




getHistory();



  
}


});



function getHistory(){
$.get("ajax/getGenerate.php", function(data){
  $('.overflow').html(data);

 // setTimeout(function(){  getHistory(); }, 0); 

});


}








$("#generate").click( function() {
  
  $("#test").val(charset1+charset2 +charset3+charset4);

var charsets = $("#test").val();
var randomP ='';
var passL = $('#generateLength').val();



if(passL <=5){
$("#testErr").val("You must first check the box");
//$("#testErr2").val("length value must be larger than 5");
$("#textGenerate").val("");

}

if(passL > 5 && charsets.length ===0){
  $("#testErr").val("You must first check the box");
//$("#testErr2").val("length value must be larger than 5");
$("#textGenerate").val("");

}
else if(passL >5){
  for(var i=0; i<passL; i++){

var randnum = Math.floor(Math.random() * charsets.length);
randomP += charsets.substring(randnum, randnum +1);

}
$("#testErr").val("");
//$("#testErr2").val("");
$("#textGenerate").val(randomP);
}




});


$("#textGenerate").focus(function(){
  $(this).blur(); 

});

/*
var inputs = $("#generateForm").serialize();

setInterval(function() {
    $.ajax({
    type: "POST",
    url: "ajax/getGenerate.php",
    data: inputs,
    success: function(data){
      //  $("#textGenerate").val("");
       $('.overflow').html(data);
     //  return false;

    }




});


}, 10);
*/




/*
function getHistory(){
$.get("ajax/getGenerate.php", function(data){
  $('.overflow').html(data);

  setTimeout(function(){  getHistory(); }, 0); 

});


}

getHistory();
*/





/*
setInterval(function() {
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("overflow").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "ajax/getGenerate.php", true);
  xhttp.send();
}, 10);
*/


});


mytext = "SpGF151-&.vOB6;~M+Dn01v,AX7Mfj88";
console.log(mytext.length);


<?php foreach ($generateHisotories as $generateHisotory){ ?>
<?php if($generateHisotory['myId'] ===  getLoggedInUser()['myId']){ ?>

  function copyToClipboard2(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  var copyText2 = document.getElementById("<?php echo $generateHisotory['historyId']; ?>");
  alert("You have copied " + $(element).text());
  $temp.remove();
}

console.log($("#<?php echo $generateHisotory['historyId']; ?>hidden2").val().length);

//console.log($("#<?php echo $generateHisotory['historyId']; ?>").html());

if($("#<?php echo $generateHisotory['historyId']; ?>hidden2").val().length <= 16){
//console.log("true");
$("#<?php echo $generateHisotory['historyId']; ?>").html($("#<?php echo $generateHisotory['historyId']; ?>").text());
}
else{
  //console.log("false");
  $("#<?php echo $generateHisotory['historyId']; ?>").html($("#<?php echo $generateHisotory['historyId']; ?>").text().substring(0,16) + "...");

}



<?php } ?>

<?php }?>
  </script>


    
   </body>

</html>