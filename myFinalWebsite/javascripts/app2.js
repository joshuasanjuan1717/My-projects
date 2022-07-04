// Initialize the agent at application startup.
const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
.then(FingerprintJS => FingerprintJS.load())

// Get the visitor identifier when you need it.
fpPromise
.then(fp => fp.get())
.then(result => {
  // This is the visitor identifier:
  const visitorId = result.visitorId
  console.log(visitorId)
  //document.write(visitorId);
  document.getElementById("device_id").value = visitorId;
})
//.catch(error => console.error(error))
/*
$(document).ready(function(){

    $("#register").on('submit', function(e) {
        e.preventDefault();
    
        charset = '0123456789',
        randomP = '';
    
        for(var i=0; i<6; i++){
    
            var randnum = Math.floor(Math.random() * charset.length);
            randomP += charset.substring(randnum, randnum +1);
    
        }
        document.getElementById("v1").value = randomP;
    
        email_val = document.getElementById("email").value;
    
        console.log(email_val);
        console.log(randomP);
    
    });
    
    
    $("#verify1").click(function() {
    
        a = document.getElementById('a1').value+document.getElementById('a2').value+document.getElementById('a3').value+document.getElementById('a4').value+document.getElementById('a5').value;
           console.log(a);
    
           document.getElementById("confirmv1").value = a;
    
    });
    
    
    
    
    
    });

*/



//First will select all inputfield
$(document).ready(function(){


    charset = '0123456789',
    randomP = '';

    for(var i=0; i<6; i++){

        var randnum = Math.floor(Math.random() * charset.length);
        randomP += charset.substring(randnum, randnum +1);

    }
   document.getElementById("v1").value = randomP;

   
    console.log(randomP);

  //  console.log(document.getElementById("myEmail").value);



  //  $("#verify1").click(function() {

//a = document.getElementById('a1').value+document.getElementById('a2').value+document.getElementById('a3').value+document.getElementById('a4').value+document.getElementById('a5').value+document.getElementById('a6').value;
//console.log(a);
  // document.getElementById("confirmv1").value = a;


//});

console.log(document.getElementById("myEmail").value);
console.log(document.getElementById("myCode").value);

});


