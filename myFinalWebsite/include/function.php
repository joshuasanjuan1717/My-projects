<?php

require_once('connection.php');

require_once('test.php');

require_once('ip.php');

require_once('encryption.php');


//I took this code in the lecture as well and I changed a bit for my project
const USER_SESSION_KEY = 'user';


session_start();

//displaying error
function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class='text-danger'>{$errors[$name]}</div>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function displayChecked($form, $name, $value) {
    if(isset($form[$name]) && $form[$name] === $value)
        echo 'checked';
}

function redirect($location) {
    header("Location: $location");
    exit();
}


function trimArray(&$array, $exclude = []) {
    foreach($array as $key => &$value) {
        if(is_string($value) && !in_array($key, $exclude))
            $value = trim($value);
    }
}

//for the user if he/she is login
function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    $key = 'email';
    if(!isset($form[$key]) || strlen($form[$key]) === 0 ){
        $errors[$key] = '&nbsp;&emsp;&emsp;Please input your email.';
    }
    else if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false){
        $errors[$key] = '&nbsp;&emsp;&emsp;Your email is invalid.';
    }
       
    $key = 'pass';
    if(!isset($form[$key]) || strlen($form[$key]) === 0 ){
        $errors[$key] = '&nbsp;&emsp;&emsp;Please input your password.';
    }
    else if(!isset($form[$key]) || strlen($form[$key]) < 8){
        $errors[$key] = '&nbsp;&emsp;&emsp;Your password is not enough.';
    }
    if(count($errors) === 0) {
        $user = getUser($form['email']);
        $myDevices = getDevices();

        if($user !== false && $form['pass'] === $user['password']){
          if($user['isVerified'] ==='1'){
if($user['device_id'] != $form['device_id'] || $user['ip_address'] != myIp() ){

foreach ($myDevices as $myDevice){

    if($myDevice['email'] === $form['email']){
    if($myDevice['device_id'] === $form['device_id'] && $myDevice['ip_address'] === myIp() ){
        $_SESSION[USER_SESSION_KEY] = $user;
    }
        }
}

}
else{
   
    $_SESSION[USER_SESSION_KEY] = $user;
}

          }
                
        }
        else{
            $errors[$key] = '&nbsp;&emsp;&emsp;Your email or password is incorrect.';
        }
            
    }

    return $errors;
}

function logoutUser() {
    
    session_unset();
}

//for the registration
function registerUser(&$form) {
    
    trimArray($form, ['password', 'confirmPassword']);

    $errors = [];

    $key = 'name';
    if(!isset($form[$key]) || strlen($form[$key]) === 0)
        $errors[$key] = 'Your name is required.';

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Your email is invalid.';
    else if(getUser($form[$key]) !== false)
        $errors[$key] = 'Your email is already existed.';

    $key = 'pass';
    if(!isset($form[$key])|| strlen($form[$key]) < 8)
        $errors[$key] = 'Your password is not enough.';
    
    $key = 'cpass';
    if(isset($form['pass']) && (!isset($form[$key]) || $form['pass'] !== $form[$key])){
        if(strlen($form[$key]) ===0){
            $errors[$key] = 'Please confirm your password.';
        }
        else{
            $errors[$key] = 'Your password does not match.';
        }
    }
       

    $key = 'clue';
    if(!isset($form[$key]) || strlen($form[$key]) === 0)
        $errors[$key] = 'Your password clue is required.';

    $key = 'num';
    if(!isset($form[$key]) || preg_match('/^09[0-9]*$/', $form[$key]) !== 1 || strlen($form[$key]) !=11 )
        $errors[$key] = 'Your phone number must be in the format: 09XXXXXXXXX.';

    $key = 'q1';
    if(!isset($form[$key]) || strlen($form[$key]) === 0)
        $errors[$key] = 'Question 1 is required.';

    $key = 'ans1';
    if(!isset($form[$key]) || strlen($form[$key]) === 0)
        $errors[$key] = 'Your answer is required.';

        $key = 'q2';
        if(!isset($form[$key]) || strlen($form[$key]) === 0)
            $errors[$key] = 'Question 2 is required.';
    
        $key = 'ans2';
        if(!isset($form[$key]) || strlen($form[$key]) === 0)
            $errors[$key] = 'Your answer is required.';

            $key = 'q3';
            if(!isset($form[$key]) || strlen($form[$key]) === 0)
                $errors[$key] = 'Question 3 is required.';
        
            $key = 'ans3';
            if(!isset($form[$key]) || strlen($form[$key]) === 0)
                $errors[$key] = 'Your answer is required.';
    

    if(count($errors) === 0) {
        
        $user = [
            'full_name' => htmlspecialchars($form['name']),
            'email' => $form['email'],
            'password' => $form['pass'],
            'password_clues' => $form['clue'],
            'phone' => htmlspecialchars($form['num']),
            'question_one' => htmlspecialchars($form['q1']),
            'answer_one' => htmlspecialchars($form['ans1']),
            'question_two' => htmlspecialchars($form['q2']),
            'answer_two' => htmlspecialchars($form['ans2']),
            'question_three' => htmlspecialchars($form['q3']),
            'answer_three' => htmlspecialchars($form['ans3']),
            'ip_address' => myIp(),
            'device_id' => $form['device_id'],
            'isVerified' => 0

            
        ];

        
        insertUser($user);
/*
       //auto login
        loginUser([
            'email' => $user['email'],
            'pass' => $form['pass']
        ]);
        */
        
    }
    return $errors;
    
}

function Add($form){

    $errors = [];
    
    $key = 'name';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'Your name is required';
    }
    $key = 'email';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'The email or username is required';
    }
    else if(preg_match('/\\s/i', $form[$key]) > 0){
        $errors[$key] = 'The email or username is invalid';
    }
    $key = 'pass';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'The password is required';
    }
    $key = 'folder';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'You must choose what folder';
    }
    $key = 'website';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'The website name is required';
    }
    $key = 'url';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = 'The url for the website is required';
    }

foreach(getAdd() as $add){
if($add['myId'] === getLoggedInUser()['myId']){
    if($form['email'] === $add['user_email'] && strtolower($add['websiteName']) === strtolower($form['website'])){
        $errors['email'] = 'This item already exists';
    }

}

}

if(count($errors) === 0) {     
    
    $Add = [
        
        'folder_id' => $form['folder'],
        'myId' => getLoggedInUser()['myId'],
        'full_name' => $form['name'],
        'user_email' => $form['email'],
        'user_password' => Encrypting($form['pass']),
        'websiteName' => $form['website'],
        'websiteUrl' => $form['url'],
        'comment' => $form['comment'],
        'Date' => $form['Date']
    ];

    insertAdd($Add);

}

return $errors;

}



function Addfolder($form){

    $errors = [];

    $key = 'folderName';
    if(!isset($form[$key]) || strlen($form[$key]) === 0){
        $errors[$key] = '&emsp;&emsp;This is required';
    }
   // else if(!isset($form[$key]) || getfolderId('1') === true ){
       // $errors[$key] = '&emsp;&emsp;This Folder Name already exists';
    //}

$folders = getAddfolder();

foreach($folders as $folder){
if($folder['myId'] === getLoggedInUser()['myId'] && strtolower($folder['folder_name']) === strtolower($form['folderName'])){

    $errors[$key] = '&emsp;&emsp;This Folder Name already exists';
}

}

        if(count($errors) === 0) {     

            $Addfolder = [
                'myId' => getLoggedInUser()['myId'],
                'folder_name' => $form['folderName'],
                'Date' => $form['Date'],
                'numLogins' => 0


            ];
        
            insertAddfolder($Addfolder);
        
        }

    return $errors;

}



function verifyEmail($form, $email){

    $errors = [];

    $key = 'confirmv1';
    if(!isset($form[$key]) || strlen($form[$key]) != 6){
        $errors[$key] = 'Lack of numbers, you must input 6 numbers';
    }
    else{

        if($form[$key] === getVerify(getUser($email)['myId'])['code']){
           
          // $errors[$key] = 'success';
          updateVerify(getUser($email)['myId']);
        

          /*
          loginUser([
            'email' => getUser($email)['email'],
            'pass' => getUser($email)['password']
        ]);
*/
        }
        else{
            $errors[$key] = 'Your verification code is not matched';
        }

    }
return $errors;

}


function forVerification($form, $email){

    if(getVerify(getUser($email)['myId']) === false){

    $verify = [
        'myId' => getUser($email)['myId'],
        'code' => $form['v1']

    ];

    insertVerify($verify);
    }
    else{
        updateVerification(getUser($email)['myId'], $form['v1']);
    }

}


function forVerification2($form, $email){

    if(getVerify2(getUser($email)['myId']) === false){

    $verify2 = [
        'myId' => getUser($email)['myId'],
        'code2' => $form['v1']

    ];

    insertVerify2($verify2);
    }
    else{
        updateVerification2(getUser($email)['myId'], $form['v1']);
    }


    
}

function forVerification02($form, $email){

    if(getVerify2(getUser($email)['myId']) === false){

    $verify2 = [
        'myId' => getUser($email)['myId'],
        'code2' => $form['v2']

    ];

    insertVerify2($verify2);
    }
    else{
        updateVerification2(getUser($email)['myId'], $form['v2']);
    }


    
}



function forDevice($form, $email){

    
    $user = getUser($email);
/*
    $myDevices = getDevices();

    if(getDevice($email) === false ){
        $device = [
            'email' => $email,
            'device_id' => $form['device_id'],
            'ip_address' => myIp()
        
        ];
        
    }


foreach ($myDevices as $myDevice){
    
  
    if($myDevice['email'] === $email) {
    
        if($myDevice['device_id'] != $form['device_id'] || $myDevice['ip_address'] != myIp()){
             $device = [
                 'email' => $email,
                 'device_id' => $form['device_id'],
                 'ip_address' => myIp()
             
             ];
         }
       
         }

}
*/

$device = [
    'email' => $email,
    'device_id' => $form['device_id'],
    'ip_address' => myIp()

];

insertDevice($device);
$_SESSION[USER_SESSION_KEY] = $user;


}

function forgotten($form){
    $errors = [];
$user = getUser($form['email']);
$key = 'email';
  //  if(!isset($form[$key])){
        
        
        if(!isset($form[$key]) || strlen($form[$key]) === 0){
            $errors[$key] = '&nbsp;&emsp;&emsp;Please input your email';
            
        }
        else if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false){
            $errors[$key] = '&nbsp;&emsp;&emsp;Your email is invalid';
            
        }
        else if(!isset($form[$key]) || $user === false){
            $errors[$key] = '&nbsp;&emsp;&emsp;Your email does not exist';
         }
        
  //  }
        
   
return $errors;
}

function forGenerateHistory($form){
$errors = [];
    $key = 'textGenerate';
if(strlen($form['textGenerate']) === 0 || $form['generateLength'] <= 5){
    $errors[$key] = 'You must first check the box before clicking the generate button.';
} 
else{

    //{duplication}


    $history = [
        'myId' => getLoggedInUser()['myId'],
        'generatedPass' => $form['textGenerate'],
        'history_date' => $form['Date']
    ];

    insertGenerateHistory($history);
}

   

return $errors;
}

function editSecurity($editQs){
    $acc = getUser(getLoggedInUser()['email']);
    $errorsQuestions = [];
    if($editQs['q1'] === "" || $editQs['ans1'] === ""){
        $errorsQuestions['q1'] = 'You have to choose a question and the answer must not be empty';

    }
    else if($editQs['q1'] != $acc['question_one'] || strtolower($editQs['ans1']) != strtolower($acc['answer_one']) ){
            $errorsQuestions['q1'] = 'It might your questions and your answers do not match in your security questions';
    }

    if($editQs['q2'] === "" || $editQs['ans2'] === ""){
        $errorsQuestions['q2'] = 'You have to choose a question and the answer must not be empty';

    }
    else if($editQs['q2'] != $acc['question_two'] || strtolower($editQs['ans2']) != strtolower($acc['answer_two'])){
        $errorsQuestions['q2'] = 'It might your questions and your answers do not match in your security questions';

    }

    if($editQs['q3'] === "" || $editQs['ans3'] === ""){
        $errorsQuestions['q3'] = 'You have to choose a question and the answer must not be empty';

    }
    else if($editQs['q3'] != $acc['question_three'] || strtolower($editQs['ans3']) != strtolower($acc['answer_three'])){
        $errorsQuestions['q3'] = 'It might your questions and your answers do not match in your security questions';

    }



return $errorsQuestions;
}


function saveSecurity($saveQs){
$errorsSave = [];
    if($saveQs['cq1'] === "" || $saveQs['cans1'] === ""){
        $errorsSave['cq1'] = 'You have to choose a question and the answer must not be empty';
    }
    if($saveQs['cq2'] === "" || $saveQs['cans2'] === ""){
        $errorsSave['cq2'] = 'You have to choose a question and the answer must not be empty';
    }
    if($saveQs['cq3'] === "" || $saveQs['cans3'] === ""){
        $errorsSave['cq3'] = 'You have to choose a question and the answer must not be empty';
    }

    return $errorsSave;
}

function editPassword($editPass){
    $errorsPass = [];
    $acc = getUser(getLoggedInUser()['email']);

    if($editPass['oldPass'] === ""){
        $errorsPass['oldPass'] = 'Please input your old password';
    }
    else if($editPass['oldPass'] != $acc['password']){
        $errorsPass['oldPass'] = 'Your old password is incorrect';
    }

    if($editPass['newPass'] === "" || $editPass['cnewPass'] === ""){
        $errorsPass['newPass'] = 'Please input your password';
    }
    else if(strlen($editPass['newPass']) < 5 || strlen($editPass['cnewPass']) < 5){
        $errorsPass['newPass'] = 'Your password is not enough';
    }
    else if($editPass['newPass'] === $acc['password']){
        $errorsPass['newPass'] = 'This is your old password';

    }
    else if($editPass['newPass'] != $editPass['cnewPass']){
        $errorsPass['newPass'] = 'Your password does not match';
    }


 return $errorsPass;
}

function editEmail($editEmail){
    $errorsEmail = [];
    $acc = getUser(getLoggedInUser()['email']);

    if($editEmail['oldEmail'] === ""){
        $errorsEmail['oldEmail'] = 'Please input your old email';
    }
    else if($editEmail['oldEmail'] != $acc['email']){
        $errorsEmail['oldEmail'] = 'Your old email is incorrect';
    }

    if($editEmail['newEmail'] === "" || $editEmail['pass'] === "" ){
        $errorsEmail['newEmail'] = 'Please input your new email and password';
    }
    else if(filter_var($editEmail['newEmail'], FILTER_VALIDATE_EMAIL) === false){
        $errorsEmail['newEmail'] = 'Your email is invalid';
    }
    else if($editEmail['newEmail'] === $acc['email']){
        $errorsEmail['newEmail'] = 'This is your old email';
    }
    else if(getUser($editEmail['newEmail']) !== false ){
        $errorsEmail['newEmail'] = 'This email already exists';
    }
    else if($editEmail['pass'] != $acc['password']){

        $errorsEmail['newEmail'] = 'Your password is incorrect';
    }

    return $errorsEmail;
}



function forgottenNext($form, $email){

$errors = [];
$acc = getUser($email);

if($form['q1'] === "" || $form['ans1'] === ""){
    $errors['q1'] = 'Your security question or your answer should not be empty';
}
else if($form['q1'] != $acc['question_one'] || strtolower($form['ans1']) != strtolower($acc['answer_one'])){
    $errors['q1'] = 'Your security question or your answer for your security question is not matched';
}

if($form['q2'] === "" || $form['ans2'] === ""){
    $errors['q2'] = 'Your security question or your answer should not be empty';
}
else if($form['q2'] != $acc['question_two'] || strtolower($form['ans2']) != strtolower($acc['answer_two'])){
    $errors['q2'] = 'Your security question or your answer for your security question is not matched';
}

if($form['q3'] === "" || $form['ans3'] === ""){
    $errors['q3'] = 'Your security question or your answer should not be empty';
}
else if($form['q3'] != $acc['question_three'] || strtolower($form['ans3']) != strtolower($acc['answer_three'])){
    $errors['q3'] = 'Your security question or your answer for your security question is not matched';
}



return $errors;
}

function editPhone($form){
    $errorPhone = [];
    $acc = getUser(getLoggedInUser()['email']);

    if(strlen($form['oldPhone']) != 11 || preg_match('/^09[0-9]*$/', $form['oldPhone']) !== 1 ){
        $errorPhone['oldPhone'] = 'You should enter the correct format (09xxxxxxxxx)';
    }
    else if($form['oldPhone'] != $acc['phone']){
        $errorPhone['oldPhone'] = 'It does not match in your old number';
    }

    if(strlen($form['newPhone']) != 11 || preg_match('/^09[0-9]*$/', $form['newPhone']) !== 1 ||  strlen($form['cnewPhone']) != 11 || preg_match('/^09[0-9]*$/', $form['cnewPhone']) !== 1){
        $errorPhone['newPhone'] = 'You should enter the correct format (09xxxxxxxxx)';
    }
    else if($form['newPhone'] === $acc['phone']){
        $errorPhone['newPhone'] = 'This is your old number';
    }
    else if($form['newPhone'] != $form['cnewPhone']){
        $errorPhone['newPhone'] = 'It does not match';
    }


return $errorPhone;
}

function emailCode($form){
    $errorEmailCode = [];

    if(strlen($_POST['verifyEmail']) != 6){
        $errorEmailCode['verifyEmail'] = 'Your verification code must contain 6 numbers';
    }
    else if($_POST['verifyEmail'] != getVerify(getUser(getLoggedInUser()['email'])['myId'])['code']){
        $errorEmailCode['verifyEmail'] = 'Your verification code is incorrect';
    }

    return $errorEmailCode;
}

function phoneCode($form){
    $errorPhoneCode = [];

    if(strlen($_POST['verifyPhone']) != 6){
        $errorPhoneCode['verifyPhone'] = 'Your verification code must contain 6 numbers';
    }
    else if($_POST['verifyPhone'] != getVerify2(getUser(getLoggedInUser()['email'])['myId'])['code2']){
        $errorPhoneCode['verifyPhone'] = 'Your verification code is incorrect';
    }

    return $errorPhoneCode;
}



