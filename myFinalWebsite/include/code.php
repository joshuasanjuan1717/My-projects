<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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

    console.log(document.getElementById("myEmail").value);



    $("#verify1").click(function() {

a = document.getElementById('a1').value+document.getElementById('a2').value+document.getElementById('a3').value+document.getElementById('a4').value+document.getElementById('a5').value+document.getElementById('a6').value;
   console.log(a);
   document.getElementById("confirmv1").value = a;


});



});

</script>
