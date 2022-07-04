$(document).ready(function () {


    let n1 = "", n01 = "", result, n2="";

    function myNumbers(num, n) {

        var x = document.getElementById(num);
 
        

        $("#1").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "1";


            $("#" + num).text(n);
            }

        });


        $("#2").click(function () {


            if (window.getComputedStyle(x).display != "none") {
            n += "2";


            $("#" + num).text(n);

            }
        });

        $("#3").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "3";


            $("#" + num).text(n);

            }
        });


        $("#4").click(function () {


            if (window.getComputedStyle(x).display != "none") {
            n += "4";


            $("#" + num).text(n);
            }

        });


        $("#5").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "5";


            $("#" + num).text(n);

            }
        });

        $("#6").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "6";


            $("#" + num).text(n);

            }
        });

        $("#7").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "7";


            $("#" + num).text(n);

            }
        });

        $("#8").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "8";


            $("#" + num).text(n);

            }
        });

        $("#9").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "9";


            $("#" + num).text(n);

            }
        });

        $("#0").click(function () {

            if (window.getComputedStyle(x).display != "none") {

            n += "0";


            $("#" + num).text(n);

            }
        });

    


    }

function myOperations(){
   if($("#operation").text() === "+"){
      n01 = parseFloat(n01) + parseFloat($("#num2").text());
  
   }
   else if($("#operation").text() === "-"){
      n01 = parseFloat(n01) - parseFloat($("#num2").text());
  
   }
   else if($("#operation").text() === "*"){
      n01 = parseFloat(n01) * parseFloat($("#num2").text());
  
   }
   else if($("#operation").text() === "/"){
      n01 = parseFloat(n01) / parseFloat($("#num2").text());
      n01 = n01.toFixed(3);
  
   }
  
  
      $("#num01").text("");

}



    myNumbers("num1", n1);

    $("#add").click(function(){
      
 var x = document.getElementById("num1");

 if (window.getComputedStyle(x).display != "none") {
  n01 = $("#num1").text();
  
  
}
if($("#num2").text() != ""){
   // n01 = parseFloat(n01) + parseFloat($("#num2").text());
   myOperations()
   
    }
    $("#num01").text(n01);
$("#num2").show();
  $("#operation").text("+");
  $("#num2").text("");
  $("#num1").text("");
  $("#num1").hide();
  $("#num01").show();
  
  myNumbers("num2", n2);


    });

   
    $("#subtract").click(function(){
           
 var x = document.getElementById("num1");

 if (window.getComputedStyle(x).display != "none") {
  n01 = $("#num1").text();
  
  
}
if($("#num2").text() != ""){
    //n01 = parseFloat(n01) - parseFloat($("#num2").text());


    myOperations()
    }
    $("#num01").text(n01);
$("#num2").show();
  $("#operation").text("-");
  $("#num2").text("");
  $("#num1").text("");
  $("#num1").hide();
  $("#num01").show();
  
  myNumbers("num2", n2);

      
 
     });

     $("#multiply").click(function(){
            
 var x = document.getElementById("num1");

 if (window.getComputedStyle(x).display != "none") {
  n01 = $("#num1").text();
  
  
}
if($("#num2").text() != ""){
  //  n01 = parseFloat(n01) * parseFloat($("#num2").text());

  myOperations()
    }
    $("#num01").text(n01);
$("#num2").show();
  $("#operation").text("*");
  $("#num2").text("");
  $("#num1").text("");
  $("#num1").hide();
  $("#num01").show();
  
  myNumbers("num2", n2);

      
 
     });

     $("#divide").click(function(){
           
 var x = document.getElementById("num1");

 if (window.getComputedStyle(x).display != "none") {
  n01 = $("#num1").text();
  
  
}
if($("#num2").text() != ""){
  //  n01 = parseFloat(n01) / parseFloat($("#num2").text());

  myOperations()
    }
    $("#num01").text(n01);
$("#num2").show();
  $("#operation").text("/");
  $("#num2").text("");
  $("#num1").text("");
  $("#num1").hide();
  $("#num01").show();
  
  myNumbers("num2", n2);

      
 
     });

     $("#equals").click(function(){
         

         if($("#operation").text() =="" || $("#num2").text() ==""){
            $("#num01").text(n01);
            $("#operation").text("");


         }
         else{
            if($("#operation").text() === "+"){
                result = parseFloat($("#num01").text()) + parseFloat($("#num2").text());
    
             }
             else if($("#operation").text() === "-"){
                result = parseFloat($("#num01").text()) - parseFloat($("#num2").text());
    
             }
             else if($("#operation").text() === "*"){
                result = parseFloat($("#num01").text()) * parseFloat($("#num2").text());
    
             }
             else if($("#operation").text() === "/"){
                result = parseFloat($("#num01").text()) / parseFloat($("#num2").text());
                result = result.toFixed(3);
    
             }
    
             n1 = "";
             n01="";
             n2 ="";
    
             $("#num1").show();
             
             $("#num1").text("");
             $("#num2").text("");
             $("#num2").hide();
             $("#num01").text("");
             $("#num01").hide();
             $("#operation").text("");
             $("#num1").text(result);
             myNumbers("num1", n1);
             console.log(result);
         }


     });





});