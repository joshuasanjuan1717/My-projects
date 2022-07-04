<?php

// I took some code in the lecture for my project

const servername = 'localhost';
const db = 'packetl1_josh';
const username = 'packetl1_joshua';
const password = 'Josh61700';

const dsn = 'mysql:host=' . servername . ';dbname=' . db;


//making a connection for a database
function createConnection() {
    return new PDO(dsn, username, password);
}

function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}

function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// for the user
function getUsers() {
    return prepareExecuteAndFetchAll('select * from user');
}
//if i need to get the email for the registration
function getUser($email) {
    return prepareExecuteAndFetch('select * from user where email = :email', ['email' => $email]);
}

function getId($id) {
    return prepareExecuteAndFetch('select * from passw where Id = :Id', ['Id' => $id]);
}

function insertUser($user) {
    return prepareAndExecute(
        'insert into user
        (full_name, email, password, password_clues, phone, question_one, answer_one, question_two, answer_two, question_three, answer_three, ip_address, device_id, isVerified) values
        (:full_name, :email, :password, :password_clues, :phone, :question_one, :answer_one, :question_two, :answer_two, :question_three, :answer_three, :ip_address, :device_id, :isVerified)', $user);
}

function editQuestions($editQs, $email){
    return prepareExecuteAndFetch('UPDATE `user` SET `question_one` = :question_one, `answer_one` = :answer_one, `question_two` = :question_two, `answer_two` = :answer_two, `question_three` = :question_three, `answer_three` = :answer_three WHERE `user`.`email` = :email', ['email' => $email, 'question_one' => $editQs['cq1'], 'answer_one' => $editQs['cans1'], 'question_two' => $editQs['cq2'], 'answer_two' => $editQs['cans2'], 'question_three' => $editQs['cq3'], 'answer_three' => $editQs['cans3'] ]);

}

function editPass($editPass, $email){
    return prepareExecuteAndFetch('UPDATE `user` SET `password` = :pass, `password_clues` = :clues WHERE `user`.`email` = :email', ['email' => $email, 'pass' => $editPass['newPass'], 'clues' => $editPass['clues']]);

}

function editmyEmail($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `user` SET `email` = :newEmail WHERE `user`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail]);

}

function editmyEmailDevice($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `forDevice` SET `email` = :newEmail WHERE `forDevice`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail]);

}

function editmyPhone($editPhone, $email){
    return prepareExecuteAndFetch('UPDATE `user` SET `phone` = :newPhone WHERE `user`.`email` = :email', ['email' => $email, 'newPhone' => $editPhone]);

}


/*
//I need to add 5 functions to edit email
function editmyEmailFolder($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `addFolder` SET `email` = :newEmail WHERE `addFolder`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail['newEmail']]);

}

function editmyEmailDevice($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `forDevice` SET `email` = :newEmail WHERE `forDevice`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail['newEmail']]);

}

function editmyEmailGenerate($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `generateHistory` SET `email` = :newEmail WHERE `generateHistory`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail['newEmail']]);

}

function editmyEmailAdd($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `passw` SET `email` = :newEmail WHERE `passw`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail['newEmail']]);

}

function editmyEmailVerify($editEmail, $email){
    return prepareExecuteAndFetch('UPDATE `verification` SET `email` = :newEmail WHERE `verification`.`email` = :email', ['email' => $email, 'newEmail' => $editEmail['newEmail']]);

}
*/



function getAdd(){
    return prepareExecuteAndFetchAll('select * from passw ORDER BY Id DESC');

}

function getAddForIndex(){
    return prepareExecuteAndFetchAll('select * from passw ORDER BY lastUpdate DESC');

}


function insertAdd($Add){
    
    return prepareAndExecute(
        'insert into passw
        (folder_id, myId, full_name, user_email, user_password, websiteName, websiteUrl, comment, lastUpdate) values
        (:folder_id, :myId, :full_name, :user_email, :user_password, :websiteName, :websiteUrl, :comment, :Date)', $Add);

}


function editAcc($edit){
    return prepareExecuteAndFetch('UPDATE `passw` SET `folder_id` = :folder_id, `full_name` = :full_name, `user_email` = :user_email, `user_password` = :user_password, `websiteName` = :websiteName, `websiteUrl` = :websiteUrl, `comment` = :comment, `lastUpdate` = :myDate WHERE `passw`.`Id` = :Id', ['Id' => $edit['id'], 'folder_id' => $edit['folder'], 'full_name' => $edit['name'], 'user_email' => $edit['email'], 'user_password' => Encrypting($edit['pass']), 'websiteName' => $edit['website'], 'websiteUrl' => $edit['url'], 'comment' => $edit['comment'], 'myDate' => $edit['Date'] ]);

}




function deleteAllAdd($folderId){
    return prepareExecuteAndFetch('delete from passw where folder_id = :folder_id', ['folder_id' => $folderId]);
}


function deleteId($id) {
    return prepareExecuteAndFetch('delete from passw where Id = :Id', ['Id' => $id]);
}


function insertAddfolder($Addfolder){
    return prepareAndExecute(
        'insert into addFolder
        (myId, folder_name, dateCreated, numLogins) values
        (:myId, :folder_name, :Date, :numLogins)', $Addfolder);

}

function getAddfolder(){
    return prepareExecuteAndFetchAll('select * from addFolder ORDER BY folder_id DESC');

}

function getfolderId($id) {
    return prepareExecuteAndFetch('select * from addFolder where folder_id = :folder_id', ['folder_id' => $id]);
}

function deleteFolder($id){

    return prepareExecuteAndFetch('delete from addFolder where folder_id = :folder_id', ['folder_id' => $id]);
}

function addAcc($id, $addAcc){
    return prepareExecuteAndFetch('UPDATE `addFolder` SET `numLogins` = :AddAcc WHERE `addFolder`.`folder_id` = :folder_id', ['folder_id' => $id, 'AddAcc' => $addAcc]);

}





function updateVerify($myId) {
    return prepareExecuteAndFetch('UPDATE `user` SET `isVerified` = 1 WHERE `user`.`myId` = :myId', ['myId' => $myId]);
}

function insertVerify($verify){
    return prepareAndExecute(
        'insert into verification
        (myId, code) values
        (:myId, :code)', $verify);

}


function insertVerify2($verify2){
    return prepareAndExecute(
        'insert into verification2
        (myId, code2) values
        (:myId, :code2)', $verify2);

}

function getVerify($myId){
    return prepareExecuteAndFetch('select * from verification where myId = :myId', ['myId' => $myId]);
    
}

function getVerify2($myId2){
    return prepareExecuteAndFetch('select * from verification2 where myId = :myId2', ['myId2' => $myId2]);
    
}


function updateVerification($myId, $code) {
    return prepareExecuteAndFetch('UPDATE `verification` SET `code` = :code WHERE `verification`.`myId` = :myId', ['myId' => $myId, 'code' => $code]);
}

function updateVerification2($myId, $code) {
    return prepareExecuteAndFetch('UPDATE `verification2` SET `code2` = :code2 WHERE `verification2`.`myId` = :myId', ['myId' => $myId, 'code2' => $code]);
}


function insertDevice($device){
    return prepareAndExecute(
        'insert into forDevice
        (email, device_id, ip_address) values
        (:email, :device_id, :ip_address)', $device);

}

function getDevice($email){
    return prepareExecuteAndFetch('select * from forDevice where email = :email', ['email' => $email]);

}

function getDevices() {
    return prepareExecuteAndFetchAll('select * from forDevice');
}

function insertGenerateHistory($history){
    return prepareAndExecute(
    'insert into generateHistory
    (myId, generatedPass, history_date) values
    (:myId, :generatedPass, :history_date)', $history);

}

function getGenerateHistory(){
    return prepareExecuteAndFetchAll('select * from generateHistory ORDER BY historyId DESC');

}

function deleteHistory($id){

    return prepareExecuteAndFetch('delete from generateHistory where historyId = :historyId', ['historyId' => $id]);
}

function deleteAllHistory($myId){
    return prepareExecuteAndFetch('delete from generateHistory where myId = :myId', ['myId' => $myId]);

}

//UPDATE `user` SET `isVerified` = '1' WHERE `user`.`email` = 'joshuakill1700@gmail.com';