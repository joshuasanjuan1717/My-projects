<?php require_once 'include/auth.php'; ?>

<html lang="en">

    <head>

    <?php require_once 'include/header.php'; ?>
  <!-- <script src="javascripts/autoLogout00.js"></script> -->

<style>

html, body {
  
  
  height:100%;



}


.unselectFolder{

text-decoration: none;
font-size: 20px;
color: white;
display: block;
margin-top: -1px;

}

.selectFolder{
    color: #01274B;
    background-color: #A0BEEB;
    display: block;
    font-size: 20px;
    text-decoration: none;
    margin-top: -1px;

}

.space4{
margin-bottom: 12px;
}

.Name{
    margin-left: calc(91.8% - 250px );
margin-top: 23px;
font-size: 26px;
}
.folder_name{
  margin-top: 10px;
  margin-left: 2%;
  font-size: 26px;
  color: #2B20AE;
}
.searchAcc{
  width: 520px;
  height: 44px;
  padding-left: 4.5%;
  margin-top: 8px;
  margin-left: 2%;
  border-radius: 20px;
  border: 1px solid black;
}

.searchAcc:focus{
  outline: none;
  box-shadow: 0px 0px 5px 2px #696969;
}

.searchAcc:hover{
  
  box-shadow: 0px 0px 5px 2px #696969;
}

.searchImg{
  position: absolute;
left: 2.7%;
margin-top: 16px;

}
.websiteHead{
  position: absolute;
  margin-left: 3.2%;
font-size: 20px;
background-color: transparent;
border: none;
}
.websiteHead:focus{
outline: none;
}
.loginsHead{
  
  margin-left: 14.2%;
  font-size: 20px;
  background-color: transparent;
border: none;
}
.loginsHead:focus{
outline: none;
}
.updateHead{

  position: absolute;
  margin-left: 59.5%;
  font-size: 20px;
  background-color: transparent;
border: none;

}
.updateHead:focus{
outline: none;
}

.passwordStrengthHead{
  position: absolute;
  margin-left: 77%;
  font-size: 20px;
  cursor: default;



}




.firstLine{
  width: 94.8%;
  border-color: black;
  border-width: 1.8px;
  margin-left: 2%;
  margin-top: -10px;
}
.Line{
  width: 94.8%;
  border-color: black;
  border-width: 1.8px;
  margin-left: 2%;
  margin-top: -8.9px;
}
.website{
  position: absolute;
  font-size: 21px;
  
  margin-top: -6.7px;
  width: 180px;
}
.nameUser{
  
  
  font-size: 23px;
  color: black;
}
.email{
  
  margin-top: -20px;
  
  font-size: 14.5px;
  color: #736A6A;
}
.copyUser{
  position: absolute;
  background-color: transparent;
outline: none;
border-style: none;
border: none;
  margin-left: 45%;
  filter: invert(13%) sepia(88%) saturate(3824%) hue-rotate(245deg) brightness(85%) contrast(106%);
}
.copyUser:focus{
  outline: none;
  border: none;
}
.copyPass:focus{
  outline: none;
  border: none;
}
.copyPass{
  position: absolute;
  background-color: transparent;
outline: none;
border-style: none;
border: none;
  margin-left: calc(45% + 42px);
  filter: invert(13%) sepia(88%) saturate(3824%) hue-rotate(245deg) brightness(85%) contrast(106%);
}

.dateUser{
  position: absolute;
  font-size: 20px;
  margin-left: 60%;
  margin-top: -3px;
  -webkit-touch-callout: none; 
    -webkit-user-select: none; 
     -khtml-user-select: none; 
       -moz-user-select: none; 
        -ms-user-select: none; 
            user-select: none; 

}
.urlWeb{
  color: black;
  margin-left: 5.6%;
  margin-top: -7px;
}
.nameUser:hover{
  text-decoration: none;

}
.urlWeb:hover{
  text-decoration: none;

}
.parent{
  position: relative;
}

.progressPass{
  position: absolute;
  margin-top: 9.6px;
  height: 9.6px;
  background-color: #d8d8d8;
  width: 18.3%;
  border-radius: none;
  margin-left: 77%;

}

.progressPass::before{
  content: '';
  display: block;
  height: 100%;
  border-radius: none;
  transition: 0.8s all linear;
  
}

.progressPass.Weak::before{
  
  background-color: #8b1414;
width: 20%;

}


.progressPass.Weak.Ok::before{
 
  background-color: #d17018;
width: 40%;

}

.progressPass.Weak.Ok.Good::before{
 
  background-color: #ffcf30;
width: 60%;

}

.progressPass.Weak.Ok.Good.SlightStrong::before{
  
  background-color: #aad000;
width: 80%;

}

.progressPass.Weak.Ok.Good.SlightStrong.Strong::before{
 
  background-color: #08cb34;
width: 100%;

}

.scroll{
  position: relative;
  overflow: auto;
  height: 410px;
  margin-right: 6.2%
}


.scroll::-webkit-scrollbar {
  width: 14px;
 
  
}

.scroll::-webkit-scrollbar-track {
  background: transparent; 
}

.scroll::-webkit-scrollbar-thumb {
  background: black; 
  border-radius: 10px;
  border: 4px solid transparent;
  background-clip: content-box;
}
.scroll::-webkit-scrollbar-thumb:hover {
  background: rgb(63, 63, 64); 
  border: 4px solid transparent;
  background-clip: content-box;
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
  <a href="folder.php" class = "unselectNav"> &nbsp;&nbsp;<img src="images/noun-folder-2803118.png" class ="navLogo" alt="logo" width="32" height="28">&emsp; Folder</a>
  <p class ="space4"> </p>
<?php foreach(getAddfolder() as $folder){ ?>
  <?php if($folder['myId'] === getLoggedInUser()['myId']){ ?>
<?php
$selection = "";
if($_GET['folder_id'] === $folder['folder_id']){
$selection = "selectFolder";
}
else{
    $selection = "unselectFolder";
}
?>

  <a href="accounts.php?folder_id=<?php echo $folder['folder_id']; ?>" class = "<?php echo $selection; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $folder['folder_name'] ?></a>
<?php } ?>
<?php } ?>

</div>

<div class="main">
<div class ="Name">Hello, <?php echo ucwords(strtolower(getLoggedInUser()['full_name'])); ?></div>
<div class = "folder_name"><?php echo getfolderId($_GET['folder_id'])['folder_name']; ?></div>
<div class ="form-group parent">
<input onkeyup="Searching()" type = "text" id = "searchAcc" class = "searchAcc" placeholder ="Search websites or logins" name = "searchAcc"/>
<img src="images/noun-search-3179535.png" width="35" height="25" class ="searchImg"/>
</div>
<br>

<div class = "scroll">
<div class ="d-flex">
<button id ="websiteHead" class ="websiteHead"><p>Website</p></button>
<button id ="websiteHead2" class ="websiteHead" style="display: none;"><p>Website</p></button>
<button id ="loginsHead" class ="loginsHead"><p >Login/s</p></button>
<button id ="loginsHead2" class ="loginsHead" style="display: none;"><p >Login/s</p></button>
<button id ="updateHead" class ="updateHead"><p >Last Updated</p></button>
<button id ="updateHead2" class ="updateHead" style="display: none;"><p >Last Updated</p></button>
<p class ="passwordStrengthHead">Password Strength</p>
</div>
<hr class ="firstLine" />
<div id="myAcc" class="myAcc">
<?php foreach(getAddForIndex() as $add){ ?>
  <?php if($add['myId'] === getLoggedInUser()['myId'] && $add['folder_id'] === $_GET['folder_id'] ){ ?>
    <div class="eachAcc">
<div class ="d-flex parent">
<?php
/*
if(strtolower($add['websiteUrl']) !="https://" && strtolower($add['websiteUrl']) !="http://"){
  $url ="http://".$add['websiteUrl'];
}
*/
/*
if(preg_match_all('/https:/i', $add['websiteUrl']) > 0 ){
  $url = $add['websiteUrl'];
}
else{
  $url ="http://".$add['websiteUrl'];
}
*/

$bookmark="";
$logo = "";
if(preg_match_all('/facebook/i', $add['websiteUrl']) > 0){
$bookmark = "javascript:(                                                                                                                                                                                                                                             function(){
 
  document.getElementById('email').value='".$add['user_email']."'; 
  document.getElementById('pass').value='".$add['user_password']."'; 
  document.getElementsByName('login')[0].click(); 


                                                                                                                                                                                                                                                })();";


  $logo = "images/facebookLogo.webp";
}
else if(preg_match_all('/bulsu/i', $add['websiteUrl']) > 0){
$bookmark = "javascript:(                                                                                                                                                                                                                                              function(){document.getElementsByName('username')[0].value='".$add['user_email']."'; document.getElementsByName('password')[0].value='".$add['user_password']."'; document.getElementsByClassName('btnsubmit')[0].click();                                                                                                                                                                                                                                                 })();";
$logo = "images/bulsuLogo.ico";

}
else if(preg_match_all('/packet/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript:(                                                                                                                                                                                                                                             function(){document.getElementById('email').value='".$add['user_email']."'; document.getElementById('pass').value='".$add['user_password']."'; document.getElementsByName('login')[0].click();                                                                                                                                                                                                                                                    })();";
  $logo = "images/logo2.png";
  
}
else if(preg_match_all('/gmail/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript:(                                                                                                                                                                                                                                                    function(){document.getElementById('identifierId').value='".$add['user_email']."'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click();  setTimeout(function(){ document.getElementsByName('password')[0].value='".$add['user_password']."'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click(); }, 1200);                                                                                                                                                                                     })();";
  
  $logo = "images/gmailLogo2.png";
}
else if(preg_match_all('/wattpad/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript:(                                                                                                                                                                                                                                             function(){
    var login00 = document.getElementsByClassName('btn-sm')[0];
    if(login00 == null){
      document.getElementsByClassName('btn-primary')[0].click();
      setTimeout(function(){
      document.getElementById('login-username').value='".$add['user_email']."'; 
      document.getElementById('login-password').value='".$add['user_password']."'; 
      document.getElementsByClassName('submit-btn')[0].click();     
    }, 100);
    }
    else if(document.getElementsByClassName('animate')[0] != null){
      document.getElementsByClassName('btn-primary')[0].click();
      setTimeout(function(){
      document.getElementById('login-username').value='".$add['user_email']."'; 
      document.getElementById('login-password').value='".$add['user_password']."'; 
      document.getElementsByClassName('submit-btn')[0].click();     
    }, 100);

    }
    else{
      login00.click();
    setTimeout(function(){ document.getElementsByClassName('btn-primary')[0].click(); }, 100);
    setTimeout(function(){ 
    document.getElementById('login-username').value='".$add['user_email']."'; 
    document.getElementById('login-password').value='".$add['user_password']."'; 
    document.getElementsByClassName('submit-btn')[0].click();                                                                                                                                                                                                                                                    
  }, 500);
}

  })();";
  $logo = "images/wattpadLogo.png";
}
else if(preg_match_all('/youtube/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript:(                                                                                                                                                                                                                                                    function(){document.getElementById('identifierId').value='".$add['user_email']."'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click();  setTimeout(function(){ document.getElementsByName('password')[0].value='".$add['user_password']."'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click(); }, 1200);                                                                                                                                                                                     })();";
$logo = "images/YouTube-Emblem3.png";
}
else if(preg_match_all('/twitter/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript: (() => {                                                                                                                                                                                                                                                 
   var login00 = document.getElementsByClassName('r-1ipicw7')[5];

    if(login00 == null){
      navigator.permissions.query({name: 'clipboard-write'})
      .then(({state}) => {
          console.log(`permission response: ${state}`);
          if (state === 'granted') {
              const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_email']."`], { type: 'text/plain' }) })];
              navigator.clipboard.write(data).then(
                  () => {
                      console.log('Clipboard write succeeded');
                  },
                  () => {
                      console.error('Clipboard write failed');
                  }
              );
          }
      });
      let warning = document.createElement('div');
      warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 10%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -140px; text-align: justify; text-justify: inter-word; cursor: default; font-family: Arial, Helvetica, sans-serif;');
      warning.setAttribute('id','warning00');
      document.getElementsByClassName('r-13qz1uu')[5].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the email/username text field.';
  
  
      
      
      var input2 = document.getElementsByName('text')[0];
      
    
      input2.focus();
      
      input2.addEventListener('paste', async function() {
        navigator.permissions.query({name: 'clipboard-write'})
        .then(({state}) => {
            console.log(`permission response: ${state}`);
            if (state === 'granted') {
                const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_password']."`], { type: 'text/plain' }) })];
                navigator.clipboard.write(data).then(
                    () => {
                        console.log('Clipboard write succeeded');
                    },
                    () => {
                        console.error('Clipboard write failed');
                    }
                );
            }
        });
        setTimeout(function(){ input2.setAttribute('readonly', ''); }, 200);
        
        setTimeout(function(){   document.getElementsByClassName('r-qvutc0')[14].click(); }, 100);
    
        setTimeout(function(){
          let warning = document.createElement('div');
      warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 22%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -130px; text-align: justify; text-justify: inter-word; cursor: default; font-family: Arial, Helvetica, sans-serif;');
      warning.setAttribute('id','warning00');
      document.getElementsByClassName('r-13qz1uu')[5].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the password text field.';
  
  
  
          var pass2 = document.getElementsByName('password')[0];
        pass2.addEventListener('paste', async function() {
      console.log('click');
      setTimeout(function(){  pass2.setAttribute('readonly', ''); }, 100);
      setTimeout(function(){   document.getElementsByClassName('r-qvutc0')[20].click(); }, 100);
      
        });
      }, 700);
  
  
      });

    }
    else{
      login00.click();

setTimeout(function(){
    navigator.permissions.query({name: 'clipboard-write'})
    .then(({state}) => {
        console.log(`permission response: ${state}`);
        if (state === 'granted') {
            const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_email']."`], { type: 'text/plain' }) })];
            navigator.clipboard.write(data).then(
                () => {
                    console.log('Clipboard write succeeded');
                },
                () => {
                    console.error('Clipboard write failed');
                }
            );
        }
    });
    let warning = document.createElement('div');
    warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 10%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -140px; text-align: justify; text-justify: inter-word; cursor: default; font-family: Arial, Helvetica, sans-serif;');
    warning.setAttribute('id','warning00');
    document.getElementsByClassName('r-13qz1uu')[5].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the email/username text field.';


    
    
    var input2 = document.getElementsByName('text')[0];
    
  
    input2.focus();
    
    input2.addEventListener('paste', async function() {
      navigator.permissions.query({name: 'clipboard-write'})
      .then(({state}) => {
          console.log(`permission response: ${state}`);
          if (state === 'granted') {
              const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_password']."`], { type: 'text/plain' }) })];
              navigator.clipboard.write(data).then(
                  () => {
                      console.log('Clipboard write succeeded');
                  },
                  () => {
                      console.error('Clipboard write failed');
                  }
              );
          }
      });
      setTimeout(function(){ input2.setAttribute('readonly', ''); }, 200);
      
      setTimeout(function(){   document.getElementsByClassName('r-qvutc0')[14].click(); }, 100);
  
      setTimeout(function(){
        let warning = document.createElement('div');
    warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 22%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -130px; text-align: justify; text-justify: inter-word; cursor: default; font-family: Arial, Helvetica, sans-serif;');
    warning.setAttribute('id','warning00');
    document.getElementsByClassName('r-13qz1uu')[5].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the password text field.';



        var pass2 = document.getElementsByName('password')[0];
      pass2.addEventListener('paste', async function() {
    console.log('click');
    setTimeout(function(){  pass2.setAttribute('readonly', ''); }, 100);
    setTimeout(function(){   document.getElementsByClassName('r-qvutc0')[20].click(); }, 100);
    
      });
    }, 700);


    });
  }, 1400);

}
  
  })();";
$logo = "images/Twitter-logo.svg.png";
}

else if(preg_match_all('/instagram/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript: (() => {                                                                                                                                                                                                                                                 
   
    navigator.permissions.query({name: 'clipboard-write'})
    .then(({state}) => {
        console.log(`permission response: ${state}`);
        if (state === 'granted') {
            const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_email']."`], { type: 'text/plain' }) })];
            navigator.clipboard.write(data).then(
                () => {
                    console.log('Clipboard write succeeded');
                },
                () => {
                    console.error('Clipboard write failed');
                }
            );
        }
    });
    
    let warning = document.createElement('div');
    warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 108%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -40px; text-align: justify; text-justify: inter-word; cursor: default;');
    warning.setAttribute('id','warning00');
    document.getElementsByClassName('-MzZI')[0].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the email/username text field.';





    
    var input2 = document.getElementsByName('username')[0];
    var pass2 = document.getElementsByName('password')[0];
  
    input2.focus();
    
    input2.addEventListener('paste', async function() {
      navigator.permissions.query({name: 'clipboard-write'})
      .then(({state}) => {
          console.log(`permission response: ${state}`);
          if (state === 'granted') {
              const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_password']."`], { type: 'text/plain' }) })];
              navigator.clipboard.write(data).then(
                  () => {
                      console.log('Clipboard write succeeded');
                  },
                  () => {
                      console.error('Clipboard write failed');
                  }
              );
          }
      });
      setTimeout(function(){ input2.setAttribute('readonly', ''); }, 100);
      setTimeout(function(){  pass2.focus(); }, 100);
      let warning2 = document.getElementById('warning00');

      warning2.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: 108%; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: 20px; text-align: justify; text-justify: inter-word; cursor: default;');
      warning2.innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the password text field.';
  
    });
  
    pass2.addEventListener('paste', async function() {
  console.log('click');
  setTimeout(function(){  pass2.setAttribute('readonly', ''); }, 100);
  setTimeout(function(){   document.getElementsByClassName('y3zKF')[0].click(); }, 100);
  
    });
  
  
  })();";
$logo = "images/instagramLogo.png";
}
else if(preg_match_all('/discord/i', $add['websiteUrl']) > 0){
  $bookmark = "javascript:(                                                                                                                                                                                                                                                                                                                                                                                                        function(){
    
    navigator.permissions.query({name: 'clipboard-write'})
    .then(({state}) => {
        console.log(`permission response: ${state}`);
        if (state === 'granted') {
            const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_email']."`], { type: 'text/plain' }) })];
            navigator.clipboard.write(data).then(
                () => {
                    console.log('Clipboard write succeeded');
                },
                () => {
                    console.error('Clipboard write failed');
                }
            );
        }
    });
    
    let warning = document.createElement('div');
    warning.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: -222px; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -290px; text-align: justify; text-justify: inter-word; cursor: default;');
    warning.setAttribute('id','warning00');
    document.getElementsByTagName('div')[5].appendChild(warning).innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the email/username text field.';





    
    var input2 = document.getElementsByName('email')[0];
    var pass2 = document.getElementsByName('password')[0];
  
    input2.focus();
    
    input2.addEventListener('paste', async function() {
      navigator.permissions.query({name: 'clipboard-write'})
      .then(({state}) => {
          console.log(`permission response: ${state}`);
          if (state === 'granted') {
              const data = [new ClipboardItem({ 'text/plain': new Blob([`".$add['user_password']."`], { type: 'text/plain' }) })];
              navigator.clipboard.write(data).then(
                  () => {
                      console.log('Clipboard write succeeded');
                  },
                  () => {
                      console.error('Clipboard write failed');
                  }
              );
          }
      });
      setTimeout(function(){ input2.setAttribute('readonly', ''); }, 100);
      setTimeout(function(){  pass2.focus(); }, 100);
      let warning2 = document.getElementById('warning00');

      warning2.setAttribute('style', 'width: 200px; position: absolute; z-index: 5; margin-left: -222px; background-color: #557A95; padding: 20px; color: white; border-radius: 20px; box-shadow: rgba(0, 0, 0) 1px 5px 7px; margin-top: -215px; text-align: justify; text-justify: inter-word; cursor: default;');
      warning2.innerHTML = '<p style=font-size:21px;margin:auto;padding-bottom:10px;>PacketLocket:</p>Please just click Ctrl+V on your keyboard or paste it into the password text field.';
  
    });
  
    pass2.addEventListener('paste', async function() {
  console.log('click');
  setTimeout(function(){  pass2.setAttribute('readonly', ''); }, 100);
  setTimeout(function(){   document.getElementsByClassName('grow-2sR_-F')[1].click(); }, 100);
  
    });


    /*
    document.getElementsByName('email')[0].value='".$add['user_email']."'; 
    document.getElementsByName('password')[0].value='".$add['user_password']."'; 
    setTimeout(function(){  document.getElementsByClassName('grow-2sR_-F')[1].click();  }, 100);                                                                                                                                                                                                                                                  
  */

  })();";

  $logo = "images/Discord-Logo-Circle-1024x1024.png";
}

else{
  $bookmark ="";
  $logo = "images/global.png";
}



?>
  <a href="<?php echo $bookmark; ?>" id ="<?php echo $add['Id']; ?>link" class ="urlWeb" onclick ="return false" ><img src ="<?php echo $logo; ?>" width="38" height="38" style ="position: absolute;"  alt="<?php echo ucwords(strtolower($add['websiteName'])); ?>" /> </a><p class="website" style="display:none;"><?php echo ucwords(strtolower($add['websiteName'])); ?></p>
  <div style ="margin-top: -14.5px; margin-left: 9%; word-wrap: break-word; width: 24%;">
  <a href="information.php?id=<?php echo $add['Id']; ?>" class ="nameUser"><p><?php echo ucwords(strtolower($add['full_name'])); ?></p></a>
  <p class="email" id ="<?php echo $add['Id']; ?>user"><?php echo $add['user_email']; ?></p>
</div>
  <button type ="button" onclick="copyToClipboardUser('#<?php echo $add['Id']; ?>user')" class ="copyUser"><img src="images/noun-user-copy-2894399.png" width="31" height="24"/></button>
  <button type ="button" onclick="copyToClipboardPass('#<?php echo $add['Id']; ?>pass')" class ="copyPass"><img src="images/copypassword.png" width="22" height="24"/></button>
  <p class="dateUser"><?php $date=date_create($add['lastUpdate']); echo date_format($date,"F j, Y"); ?></p>
  <p class ="myDate" style="display: none;"> <?php $date=date_create($add['lastUpdate']); echo date_format($date,"Y-m-d H:i:s"); ?> </p>
  <p id="<?php echo $add['Id']; ?>pass" style ="display: none" ><?php echo Decrypting($add['user_password']); ?></p>
  <div class = "progressPass" id = "<?php echo $add['Id']; ?>progressPass"> </div>
  <p id = "<?php echo $add['Id']; ?>checkerPass" style ="display: none;" > </p>
</div>
<hr class ="Line" />
</div>

<?php } ?>
<?php } ?>
</div>

<p id="noAcc" style="display: none; font-size: 21px; margin-left: 4%; font-weight: 550;">No websites or accounts found</p>

</div>


</div>


<script>
<?php foreach (getAdd() as $add){ ?>
<?php if($add['myId'] ===  getLoggedInUser()['myId'] && $add['folder_id'] === $_GET['folder_id']){ ?>

  function copyToClipboardUser(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  var copyText2 = document.getElementById("<?php echo $add['Id']; ?>user");
  alert("You have copied " + $(element).text());
  $temp.remove();
}

function copyToClipboardPass(element1) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element1).text()).select();
  document.execCommand("copy");
  var copyText2 = document.getElementById("<?php echo $add['Id']; ?>pass");
  alert("You have copied your Password");
  $temp.remove();
}

<?php } ?>

<?php }?>

function Searching() {
  var search, filt, acc, content, folderName, x, result;
  search = document.getElementById("searchAcc");
  filt = search.value.toUpperCase();
  acc = document.getElementById("myAcc");
  content = acc.getElementsByClassName("eachAcc");
  for (x = 0; x < content.length; x++) {
    urlName = content[x].getElementsByClassName("website")[0];
    accName = content[x].getElementsByClassName("nameUser")[0];
    accEmail = content[x].getElementsByClassName("email")[0];
  //can add more
    if (accName || urlName) {
      result = accName.textContent || accName.innerText;
      result2 = urlName.textContent || urlName.innerText;
      result3 = accEmail.textContent || accEmail.innerText;
      if (result.toUpperCase().indexOf(filt) > -1 || result2.toUpperCase().indexOf(filt) > -1 || result3.toUpperCase().indexOf(filt) > -1 ) {
        content[x].style.display = "";
      } else {
        content[x].style.display = "none";
      }
    }       
  }

  if($('.eachAcc:visible').length === 0){
    $("#noAcc").show()

}
else{
    $("#noAcc").hide()

}



}


</script>

<script>



document.addEventListener( 'visibilitychange' , function() {
    if (document.hidden) {
        console.log('bye');
       // clearTimeout(wait);

    } else {
        console.log('well back');
       // wait = setTimeout(cb, ms);
       alert("Opening more than one tab and having inactivity on one of the tabs on the same website isn't recommended. If you proceed to open another tab, your account will be automatically logged out after a few minutes.");
    }
}, false );



/*
function userCheated() {
    // The user cheated by leaving this window (e.g opening another window)
    // Do something
    alert("Hi! Please don't open it on other tab. After 1 minute, you will be automatically logged out. There should only be one tab.");
}


window.onblur = userCheated;
*/
/*
// Broadcast that you're opening a page.
localStorage.openpages = Date.now();
        var onLocalStorageEvent = function(e){
            if(e.key == "openpages"){
                // Listen if anybody else is opening the same page!
                localStorage.page_available = Date.now();
            }
            if(e.key == "page_available"){
                alert("Hi! Please don't open it on other tab. After 1 minute, you will be automatically logged out. There should only be one tab.");
            }
        };
        window.addEventListener('storage', onLocalStorageEvent, false);

*/

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
  //clearTimeout(wait);



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

$( document ).ready(function() {

  

$("#websiteHead").click(function(){
  $("#websiteHead").hide();
  $("#websiteHead2").show();

  var myAcc, eachAcc, Switch, i, name1, name2, swap;
  myAcc = document.getElementById("myAcc");
  Switch = true;
  
  while (Switch) {
    
    Switch = false;
    eachAcc = myAcc.getElementsByClassName("eachAcc");
    
    for (i = 0; i < (eachAcc.length-1); i++) {
      
      swap = false;
      
      name1 = eachAcc[i].getElementsByClassName("website")[0];
      name2 = eachAcc[i + 1].getElementsByClassName("website")[0];
      
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


$("#websiteHead2").click(function(){
  $("#websiteHead2").hide();
  $("#websiteHead").show();

  var myAcc, eachAcc, Switch, i, name1, name2, swap;
  myAcc = document.getElementById("myAcc");
  Switch = true;
  
  while (Switch) {
    
    Switch = false;
    eachAcc = myAcc.getElementsByClassName("eachAcc");
    
    for (i = 0; i < (eachAcc.length-1); i++) {
      
      swap = false;
      
      name1 = eachAcc[i].getElementsByClassName("website")[0];
      name2 = eachAcc[i + 1].getElementsByClassName("website")[0];
      
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





$("#loginsHead").click(function(){
  $("#loginsHead").hide();
  $("#loginsHead2").show();

 var myAcc, eachAcc, Switch, i, name1, name2, swap;
 myAcc = document.getElementById("myAcc");
 Switch = true;
 
 while (Switch) {
   
   Switch = false;
   eachAcc = myAcc.getElementsByClassName("eachAcc");
   
   for (i = 0; i < (eachAcc.length-1); i++) {
     
     swap = false;
     
     name1 = eachAcc[i].getElementsByClassName("nameUser")[0];
     name2 = eachAcc[i + 1].getElementsByClassName("nameUser")[0];
     
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


$("#loginsHead2").click(function(){
  $("#loginsHead2").hide();
  $("#loginsHead").show();

 var myAcc, eachAcc, Switch, i, name1, name2, swap;
 myAcc = document.getElementById("myAcc");
 Switch = true;
 
 while (Switch) {
   
   Switch = false;
   eachAcc = myAcc.getElementsByClassName("eachAcc");
   
   for (i = 0; i < (eachAcc.length-1); i++) {
     
     swap = false;
     
     name1 = eachAcc[i].getElementsByClassName("nameUser")[0];
     name2 = eachAcc[i + 1].getElementsByClassName("nameUser")[0];
     
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


$("#updateHead").click(function(){
 
  $("#updateHead").hide();
  $("#updateHead2").show();

 var myAcc, eachAcc, Switch, i, name1, name2, swap;
 myAcc = document.getElementById("myAcc");
 Switch = true;
 
 while (Switch) {
   
   Switch = false;
   eachAcc = myAcc.getElementsByClassName("eachAcc");
   
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


$("#updateHead2").click(function(){
 
 $("#updateHead2").hide();
 $("#updateHead").show();

var myAcc, eachAcc, Switch, i, name1, name2, swap;
myAcc = document.getElementById("myAcc");
Switch = true;

while (Switch) {
  
  Switch = false;
  eachAcc = myAcc.getElementsByClassName("eachAcc");
  
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





<?php foreach(getAdd() as $add){ ?>
  <?php if($add['myId'] === getLoggedInUser()['myId'] && $add['folder_id'] === $_GET['folder_id']){ ?>

$("#<?php echo $add['Id']; ?>link").click(function(){

<?php
$url ="";
if(preg_match_all('/https:/i', $add['websiteUrl']) > 0 ){
  $url = $add['websiteUrl'];
  


}
else{
  $url ="http://".$add['websiteUrl'];
}


?>

window.open("<?php echo $url; ?>", "_blank");



});













<?php } ?>
<?php } ?>






});

//console.log(document.getElementById("93pass").innerHTML);

</script>

<script>

var weak = 0, ok = 0, good = 0, slight = 0, strong = 0, total = 0;



<?php foreach(getAdd() as $add){ ?>
  <?php if($add['myId'] === getLoggedInUser()['myId'] && $add['folder_id'] === $_GET['folder_id']){ ?>


duplicate = 0, d = 0, isduplicate = "false";

mypass = document.getElementById("<?php echo $add['Id']; ?>pass");
 progress = document.getElementById("<?php echo $add['Id']; ?>progressPass");
 checker = document.getElementById("<?php echo $add['Id']; ?>checkerPass");

myString =  Array.from(mypass.innerHTML);
  // console.log(myString);

  for(let i = 0; i<myString.length; i++){
    if(myString[myString.length-1] === myString[myString.length-2]){
        isduplicate = "true";
        //duplicate++;
        //console.log(duplicate);

    }
    else{
        isduplicate = "false";
    }
    

  }
  if(isduplicate == "true"){
    duplicate++;
  }
  else{
      duplicate = 0;
  }
  console.log(duplicate);

  

  
if(mypass.innerHTML.length >4 && mypass.innerHTML.match(/[A-Za-z0-9]/g) || mypass.innerHTML.length >4 && mypass.innerHTML.match(/[!@#$%^&*()_+~`|}{[:;?,./=''"]/g)){
    progress.classList.add('Weak');
  //  passStrength.value = "Weak";
  checker.innerHTML = "weak";
}
else{
    progress.classList.remove('Weak');
   // passStrength.value = "";
}
if(mypass.innerHTML.length >8 && mypass.innerHTML.match(/[A-Z]/g) && mypass.innerHTML.match(/[a-z]/g) && mypass.innerHTML.match(/[0-9]/g)){
    progress.classList.add('Ok');
  //  passStrength.value = "Ok";
  checker.innerHTML = "ok";
}
else{
    progress.classList.remove('Ok');
   // passStrength.value = "";

}

if(mypass.innerHTML.length >8 && mypass.innerHTML.match(/[A-Z]/g) && mypass.innerHTML.match(/[a-z]/g) && mypass.innerHTML.match(/[0-9]/g) && mypass.innerHTML.match(/[!@#$%^&*()_+~`|}{[:;?,./=''"]/g) ){
    progress.classList.add('Good');
  //  passStrength.value = "Good";
  checker.innerHTML = "good";
}
else{
    progress.classList.remove('Good');
   // passStrength.value = "";

}

if(mypass.innerHTML.length >15 && mypass.innerHTML.match(/[A-Z]/g) && mypass.innerHTML.match(/[a-z]/g) && mypass.innerHTML.match(/[0-9]/g) && mypass.innerHTML.match(/.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*/g) ){
    progress.classList.add('SlightStrong');
   // passStrength.value = "Slightly Strong";
   checker.innerHTML = "slight";
}
else{
    progress.classList.remove('SlightStrong');
  //  passStrength.value = "";

}

if(mypass.innerHTML.length >17 && mypass.innerHTML.match(/[A-Z]/g) && mypass.innerHTML.match(/[a-z]/g) && mypass.innerHTML.match(/[0-9]/g) && mypass.innerHTML.match(/.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*[!@#$%^&*()_+~`|}{[:;?><,./=''"]+.*/g) && duplicate < 2 ){
    
   

    progress.classList.add('Strong');
   // passStrength.value = "Strong";
   checker.innerHTML = "strong";
}
else{
    progress.classList.remove('Strong');
 //   passStrength.value = "";

}

total++;

if(checker.innerHTML == "weak"){
  weak++;
}
else if(checker.innerHTML == "ok"){
  ok++;
}
else if(checker.innerHTML == "good"){
  good++;

}
else if(checker.innerHTML == "slight"){
  slight++;

}
else if(checker.innerHTML == "strong"){
  strong++;

}


  
<?php } ?>
<?php } ?>
</script>

<script>

document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "pass=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "folder=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "website=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "url=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";
   document.cookie = "comment=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addAccount.php";



</script>



</body>



</html>