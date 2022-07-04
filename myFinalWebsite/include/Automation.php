
<html>


<form method="post">

<input name ="email" type ="text" id="username" />
<input name ="pass" type ="text" id="password" />
<button type="submit">submit</button>
<a href="javascript:(function(){document.getElementById('identifierId').value='gmkiller06@gmail.com'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click(); document.getElementsByName('password')[0].value='Josh61700'; document.getElementsByClassName('VfPpkd-vQzf8d')[0].click(); })();" id ="click" onclick="checkLoginState()">click </a>
<button type="button" id ="del">delete</button>
</form>

<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

  /**
    * Do not remove this section; it allows our team to troubleshoot and track feature adoption. 
    * TS:0002-13-010
  */

 // function setFormValues(response) {
    
    // ***UPDATE FIELDS BELOW***
    //Adjust field IDs on the left with the field IDs on your form
 //   $('#email').val(response.email);
  //  $('#name').val(response.first_name);
      
    //Uncomment the lines below if you require the additional data
      
    //$('#firstNameField').val(response.first_name);
    //$('#lastNameField').val(response.last_name);
    //$('#linkField').val(response.link);
    //$('#genderField').val(response.gender);
    
    //The form willl submit by default. To disable this comment out the line below
   // document.querySelector('.lp-pom-form button').click()
 // }
  
/*
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      fillForm();
    } else if (response.status === 'not_authorized') {
      triggerLogin();
    } else {
      triggerLogin();
    }
  }
  
  // Show Login Window
  function triggerLogin() {
    
   FB.login(function(response) {

    
     if (response.status === 'connected') {
         fillForm(); 
        }
       
   }, {scope: 'public_profile,email'}); 
  }
  
  // Called when your Facebook button is clicked
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  // Update appId below to reflect your Facebook Apps ID
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '949027339095272',
    cookie     : true, 
    xfbml      : true, 
    version    : 'v13.0',
    status     : true
  });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  function fillForm() {
  
  // Update the variable below with the fields you wish to obtain
  // See the full list of fields here:
  // https://developers.facebook.com/docs/graph-api/reference/user
    var requestedFields = {
      fields: 'name, first_name, last_name, email'
    };
    
    FB.api('/me', requestedFields, function(response) {
      setFormValues(response);
    });
  }
  */

/*
$("#click").click(function(){
  
  (function(){ document.getElementById("email").value="joshua";document.getElementById("pass").value="joshua";})();

});
*/
 $("#click").click(function(){

  window.open("https://gmail.com", "_blank");


});
</script>



</body>


</html>




