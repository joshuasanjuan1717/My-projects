<?php


function isMobile(){
    $devicecheck= is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

return $devicecheck;
}

function isAndroid(){
    $devicecheck_android= is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"android"));

return $devicecheck_android;
}

/*
if($devicecheck==1 OR $devicecheck_android==1)
{
 echo 'You are using a mobile device';
}
else{
echo 'You are using a browser';
}
*/

if(isMobile() || isAndroid()){
header('location: https://mobile.packetlocket.ml/');

}



?>