<?php 
include 'function.php';
$number = $_GET['Number'];
$code = $_GET['oldEmail'];

?>
<?php
// Required if your environment does not handle autoloading
require 'vendor/autoload.php';
/*
// Use the REST API Client to make requests to the Twilio REST API
$MessageBird = new \MessageBird\Client('BUuMIOvuUGvGnB8uEqFW0VGIA');
  $Message = new \MessageBird\Objects\Message();
  $Message->originator = 'TestMessage';
  $Message->recipients = array(+639193030964);
  $Message->body = 'This is a test message';

  $MessageBird->messages->create($Message);
*/

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
/*
use Twilio\Rest\Client; 
 
$sid    = "ACe15a217ca5289932a7ddeed8bcbdc903"; 
$token  = "3a8b4c72cc7eee92fa3d2a208b322a5d"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+639193030964", // to 
                           array(  
                               "messagingServiceSid" => "MG365d67a63c8f7e7d436ad8d9b9fd203f",      
                               "body" => "hello" 
                           ) 
                  ); 
 
print($message->sid);
*/
/*
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://nexmo-nexmo-messaging-v1.p.rapidapi.com/send-sms?from=+639193030964&to=+639193030964",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: nexmo-nexmo-messaging-v1.p.rapidapi.com",
		"x-rapidapi-key: 11069ead70mshb3a1847c4457918p145d32jsn17dd392c8798"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
*/







use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY0Nzc5MTM2NCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkzMjUwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.DQ1rcgkZUu423sU9e04bBqwEowQMePMyQiP2S9_9ego');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);


// Sending a SMS Message
$sendMessageRequest1 = new SendMessageRequest([
    'phoneNumber' => $number,
    'message' => getVerify2(getUser($code)['myId'])['code2'].' is your PacketLocket authentication code. For your protection, do not share this code with anyone.',
   // 'phoneNumber' => '09193030964',
  //  'message' => 'test',
    'deviceId' => 127763
]);

$sendMessages = $messageClient->sendMessages([
    $sendMessageRequest1
    
]);
//print_r($sendMessages);






?>

<html>

<body>

<script type="text/javascript">
 

 document.cookie = "verifyPhone=false; path=/settings.php";

   window.location.href= '../settings.php';


</script>



</body>

</html>