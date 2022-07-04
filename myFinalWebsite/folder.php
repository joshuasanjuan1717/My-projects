<?php require_once 'include/auth.php'; ?>
<?php
if(isset($_POST['addFolder'])){
  
  $errors = [];
 $errors = Addfolder($_POST);

}

$folders = getAddfolder();


if(isset($_POST['buttonDelete'])){

  header('location: deleteFolder.php?folder_id='.$_POST['Delete']);

}



?>



<!DOCTYPE html>
<html lang="en">
    <head>

    <?php require_once 'include/header.php'; ?>
    


<style>
.Name{
margin-left: 740px;
margin-top: 23px;
font-size: 26px;

}

.foldertext{
margin-left: 40px;
font-size: 25px;
font-weight: 600;
color: #2B20AE;

}

.folderName{
  width: 350px;
  height: 30px;
  margin-top: -16px;
  margin-left: 40px;

}

.folderNameText{
  margin-left: 40px;
margin-top: 18px;

}

.folderText{
  margin-top: 16px;
  margin-left: 40px;

}
.folderButton{
  margin-top: 12px;
  width: 180px;
  height: 34px;
  margin-left: 40px;
  background-color: #2B20AE;
  border: #2B20AE;
  color: white;
}

.searchFolder{
  margin-left: 40px;
  width: 550px;
  height: 46px;
  padding-left: 48px;
  margin-top: 15px;

}
.searchImg{
position: absolute;
margin-left: 44px;
margin-top: -35px;
}
.parent{
  position: relative;
}
.parent2{

  position: relative;
}

.dateCreatedText{
  
  margin-top: 18px;

}
.firstLine{
  width: 70.1%;
  border-color: black;
  border-width: 1.8px;
  margin-left: 40px;
  margin-top: -10px;
}
.Line{
  width: 70.1%;
  border-color: black;
  border-width: 1.8px;
  margin-left: 40px;
  margin-top: 1px;
}

.folderNames{
  margin-left: 40px;
font-size: 22px;
margin-top: -14px;
}

.folderNamesImg{
  position: absolute;
  margin-left: 54%;
  margin-top: -5px;
  filter: invert(12%) sepia(58%) saturate(5323%) hue-rotate(344deg) brightness(63%) contrast(117%);
background-color: transparent;
border: transparent;

}
.folderNamesImg:focus{
outline: none;

}

.folderDate{
  position: absolute;
  margin-top: -5px;
  font-size: 17px;
  margin-left: 36%;
  -webkit-touch-callout: none; 
    -webkit-user-select: none; 
     -khtml-user-select: none; 
       -moz-user-select: none; 
        -ms-user-select: none; 
            user-select: none; 
                                 


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
.numLogins{
  position: absolute;
  margin-left: 40px;
margin-top: 12.6px;
color: #736A6A;
font-size: 13.8px;
}
.folderLink{
  
  color: black;
}
.folderLink:hover{
  text-decoration: none;
  
}

.deleteContent{
  position: fixed;
  height: 226px;
  width: 492px;
  border: 1.7px solid black;
  background-color: #D1F0FE;
  display: none;
  z-index: 3;
}

.content{
  margin-top: 190px;
  position: fixed;
  margin-left: 540px;
  z-index: 3;
}
.title{
  font-size: 33px;
  font-weight: 630;
  margin-top: 10px;
  color: #660002;
}
.body{
  text-align: center;
  margin-top: 10px;
  margin-left: 30px;
  margin-right: 30px;
  font-size: 19px;
}
.buttons{
  margin-top: 20px;
}
.buttonDelete{
  height: 45px;
  width: 170px;
  margin-left: 48px;
  font-size: 19px;
  border: transparent;
  background-color: #903509;
  color: white;
  
}
.buttonCancel{
  height: 45px;
  width: 180px;
  margin-left: 48px;
  font-size: 19px;
  border: transparent;
  background-color: #2B20AE;
  color: white;

}
.undone{
  color: #B16A16;
}
.sure{
  color: #676666;
}

.buttonFolderName, .buttonCreated{
  background-color: transparent;
  border: none;
  margin-left: -4px;
}


.buttonCreated{
  position: absolute;
  margin-left: 36%;
}

.buttonFolderName:focus, .buttonCreated:focus{
  outline: none;
}



  </style>

    </head>

    <body>
    <div class="sidenav">
    <div class = "d-flex justify-content-center navTitle">
    <img src="images/homeLogopng.png" style="margin-top: -4px; margin-bottom: 16px;" alt="logo" width="175" height="39">

</div>
  <a href="index.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-packet-2940135.png" class ="navLogo" alt="logo" width="35" height="35">&emsp; Packet</a>
  <a href="generate.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-password-generating-3610319.png" class ="navLogo" alt="logo" width="35" height="31"> &emsp;Generate Password</a>
  <a href="settings.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-settings-2650508.png" class ="navLogo" alt="logo" width="33" height="27"> &emsp;Settings</a>
  <a href="addAccount.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-add-account-1559194.png" class ="navLogo" alt="logo" width="33" height="29"> &emsp;Add Account</a>
  <a href="folder.php" class = "selectNav"> &nbsp;&nbsp;<img src="images/noun-folder-2803118.png" class ="navLogo2" alt="logo" width="32" height="28">&emsp; Folder</a>
  <p class ="space4"> </p>
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
  <a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class = "unselectFolder">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folder['folder_name'] ?></a>
<?php } ?>
<?php } ?>

</div>

<div class="main">
  
  <div class="myTitle">
<div class ="Name">Hello, <?php echo getLoggedInUser()['full_name']; ?></div>

<div class = "foldertext">Add Folder</div>
  </div>
<form method ="post">
<input type = "hidden" name ="Delete" id ="hiddenDelete" readonly/>
<div class="d-flex align-items-center justify-content-center content" id ="content">
<div id ="deleteContent" class="deleteContent">
<div class="d-flex align-items-center justify-content-center title">
Confirmation
  </div>
<div class="body">
<span class="sure">Are you sure? The selected item will be deleted permanently and </span><span class="undone">this cannot be undone</span>
  </div>
<div class="d-flex buttons">


<button type ="submit" name ="buttonDelete" class="buttonDelete">Delete</button>
<button type ="button" id="buttonCancel" class="buttonCancel">Cancel</button>
  </div>
  </div>
  </div>
  <div class="myBody"> 
<p class="folderText">Name of the Folder </p>
<input type = "text" id = "folderName" class = "form-control rounded-0 border-dark folderName" placeholder ="Enter here" name = "folderName"/>
<button class ="folderButton" name ="addFolder">Add New Folder </button>
<?php displayError($errors, 'folderName'); ?>
<br>
<br>
<p> </p>
<div class = "foldertext">Manage Folder</div>
<div class ="form-group parent">
<input onkeyup="Searching()" type = "text" id = "searchFolder" class = "form-control rounded-0 border-dark searchFolder" placeholder ="Search Folder" name = "searchFolder"/>
<img src="images/noun-search-3179535.png" width="35" height="25" class ="searchImg"/>
</div>
<div class="d-flex">
<button type ="button" id ="folderNameText" class="buttonFolderName"><p class="folderNameText">Folder Name</p></button>
<button type ="button" id ="folderNameText2" class="buttonFolderName" style="display: none;"><p class="folderNameText">Folder Name</p></button>

<button type ="button" id ="dateCreatedText" class="buttonCreated"><p class="dateCreatedText">Date Created</p></button>
<button type ="button" id ="dateCreatedText2" class="buttonCreated" style="display: none;"><p class="dateCreatedText">Date Created</p></button>

</div>
<hr class ="firstLine" />
<div id ="folders">
<?php foreach($folders as $folder) {?>
<?php if($folder['myId'] === getLoggedInUser()['myId']) { ?>
<div id ="eachFolder" class ="eachFolder">
<div class="d-flex">
<a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class="folderLink" ><p class ="folderNames"> <?php echo $folder['folder_name']; ?></p></a> 
<p class ="numLogins"><?php echo $folder['numLogins'] ?> Logins</p>
<p class ="folderDate">  <?php $date=date_create($folder['dateCreated']); echo date_format($date,"F j, Y");?></p> 
<p class ="myDate" style="display: none;"> <?php $date=date_create($folder['dateCreated']); echo date_format($date,"Y-m-d H:i:s"); ?> </p>

<button type ="button" name ="<?php echo $folder['folder_id']; ?>" id ="<?php echo $folder['folder_id']; ?>" class="folderNamesImg"> <img src="images/mobile_delete.png" width="29" height="27"/></button>
</div>
<hr class ="Line" />
</div>
<?php } ?>

<?php } ?>
</div>
</div>

  <input type="hidden" value="<?php date_default_timezone_set('Asia/Manila'); echo date("Y-m-d H:i:s"); ?>" name = "Date" readonly/>



</form>



</div>

<script>

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
/*
  $("#searchFolder").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#folders #eachFolder").filter(function() {
      
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

  });



});
*/
/*
$(document).ready(function(){
var $search = $("#searchFolder").on('keyup', function() {
var match = new RegExp($(this).val().toLowerCase(), 'gi');
jQuery('.eachFolder').show().not(function(){
  return match.test($(this).find('.folderNames, .folderDate, .numLogins').text().toLowerCase())
}).hide();

})
*/
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
$("#<?php echo $folder['folder_id']; ?>").click(function() {
 // document.body.scrollTop = 0;
 // document.documentElement.scrollTop = 0;
  $("#deleteContent").css("display","block");
  //$("body > *").not("body > #elementtokeep").css("filter","blur(4px)");
 $(".sidenav").css("filter","blur(5px)");
 $(".myTitle").css("filter","blur(5px)");
 $(".myBody").css("filter","blur(5px)");
$("#hiddenDelete").val("<?php echo $folder['folder_id']; ?>");

});

$("#buttonCancel").click(function() {
  //document.body.scrollTop = 0;
 // document.documentElement.scrollTop = 0;
  $("#deleteContent").css("display","none");
  $(".sidenav").css("filter","");
  $(".myTitle").css("filter","");
 $(".myBody").css("filter","");

});



<?php } ?>
<?php } ?>


$("#folderNameText").click(function(){
  $("#folderNameText").hide();
  $("#folderNameText2").show();
  var myAcc, eachAcc, Switch, i, name1, name2, swap;
  myAcc = document.getElementById("folders");
  Switch = true;
  
  while (Switch) {
    
    Switch = false;
    eachAcc = myAcc.getElementsByClassName("eachFolder");
    
    for (i = 0; i < (eachAcc.length-1); i++) {
      
      swap = false;
      
      name1 = eachAcc[i].getElementsByClassName("folderNames")[0];
      name2 = eachAcc[i + 1].getElementsByClassName("folderNames")[0];
      
      if (name1.innerHTML.toLowerCase() > name2.innerHTML.toLowerCase()) {
        
        swap = true;
        break;
      }
    }
    if (swap) {
      
      eachAcc[i].parentNode.insertBefore(eachAcc[i + 1], eachAcc[i]);
      Switch = true;
    }
  }




});

$("#folderNameText2").click(function(){
  $("#folderNameText2").hide();
  $("#folderNameText").show();
  var myAcc, eachAcc, Switch, i, name1, name2, swap;
  myAcc = document.getElementById("folders");
  Switch = true;
  
  while (Switch) {
    
    Switch = false;
    eachAcc = myAcc.getElementsByClassName("eachFolder");
    
    for (i = 0; i < (eachAcc.length-1); i++) {
      
      swap = false;
      
      name1 = eachAcc[i].getElementsByClassName("folderNames")[0];
      name2 = eachAcc[i + 1].getElementsByClassName("folderNames")[0];
      
      if (name1.innerHTML.toLowerCase() < name2.innerHTML.toLowerCase()) {
        
        swap = true;
        break;
      }
    }
    if (swap) {
      
      eachAcc[i].parentNode.insertBefore(eachAcc[i + 1], eachAcc[i]);
      Switch = true;
    }
  }




});



$("#dateCreatedText").click(function(){
  $("#dateCreatedText").hide();
  $("#dateCreatedText2").show();

var myAcc, eachAcc, Switch, i, name1, name2, swap;
myAcc = document.getElementById("folders");
Switch = true;

while (Switch) {
  
  Switch = false;
  eachAcc = myAcc.getElementsByClassName("eachFolder");
  
  for (i = 0; i < (eachAcc.length-1); i++) {
    
    swap = false;
    
    name1 = eachAcc[i].getElementsByClassName("myDate")[0];
    name2 = eachAcc[i + 1].getElementsByClassName("myDate")[0];
    
    if (name1.innerHTML.toLowerCase() > name2.innerHTML.toLowerCase()) {
      
      swap = true;
      break;
    }
  }
  if (swap) {
    
    eachAcc[i].parentNode.insertBefore(eachAcc[i + 1], eachAcc[i]);
    Switch = true;
  }
}




});



$("#dateCreatedText2").click(function(){
  $("#dateCreatedText2").hide();
  $("#dateCreatedText").show();

var myAcc, eachAcc, Switch, i, name1, name2, swap;
myAcc = document.getElementById("folders");
Switch = true;

while (Switch) {
  
  Switch = false;
  eachAcc = myAcc.getElementsByClassName("eachFolder");
  
  for (i = 0; i < (eachAcc.length-1); i++) {
    
    swap = false;
    
    name1 = eachAcc[i].getElementsByClassName("myDate")[0];
    name2 = eachAcc[i + 1].getElementsByClassName("myDate")[0];
    
    if (name1.innerHTML.toLowerCase() < name2.innerHTML.toLowerCase()) {
      
      swap = true;
      break;
    }
  }
  if (swap) {
    
    eachAcc[i].parentNode.insertBefore(eachAcc[i + 1], eachAcc[i]);
    Switch = true;
  }
}




});




});





function Searching() {
  var search, filt, folder, content, folderName, x, result;
  search = document.getElementById("searchFolder");
  filt = search.value.toUpperCase();
  folder = document.getElementById("folders");
  content = folder.getElementsByTagName("div");
  for (x = 0; x < content.length; x++) {
    folderName = content[x].getElementsByClassName("folderNames")[0];
  //can add more
    if (folderName) {
      result = folderName.textContent || folderName.innerText;
      if (result.toUpperCase().indexOf(filt) > -1) {
        content[x].style.display = "";
      } else {
        content[x].style.display = "none";
      }
    }       
  }
}

</script>
    
   </body>

</html>