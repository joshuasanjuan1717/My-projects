

<?php

$fullname = 'Joshua Sanjuan';
$course = 'BS math';
$date = date("F j, Y", strtotime('+8 hours', strtotime(date("Y-m-d")))); 

echo $date.': My name is '.$fullname.' and my Course is '.$course;



?>


<html lang="en">
<head>
<title>PHP Sample Code</title>
</head>
<body>

<?php 

$name = 'Rhea Faustino';

echo 'Hi my name is '.$name.' '; 

echo 'Our date is '; 

$new_date = date("F j, Y h:i:s A", strtotime('+8 hours', strtotime(date("Y-m-d h:i:s")))); 
echo $new_date;

?>



</body>


</html>



