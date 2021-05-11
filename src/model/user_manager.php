<?php

require "model/dbConnector.php";

/**
 * @param $registerData
 */
function registerUser($registerData) {
    // By default the account type should be a member
    $accountType = 1;
    // Temporary solution to generate an unique id for the client
    $clientCode = uniqid();
    //Hashes the password
    $password = password_hash($registerData["password"], PASSWORD_DEFAULT);

    //TODO change the name of registerData's array names in the query
    $lastname = $registerData['lastname'];
    $firstname = $registerData['firstname'];
    $email = $registerData['email'];
    $birthdate = $registerData['birthdate'];

    $query = "INSERT INTO `luxhub`.`people` (`Account_type_id`, `client_code`, `lastname`, `firstname`, `email`, `password`, `birthdate`) VALUES ($accountType, $clientCode, $lastname, $firstname, $email, $password, $birthdate);";
}


/**
 * @param $userEmail
 * @return bool Returns true if the user already exists, false in the opposite case.
 */
function verifyUser($userEmail) {
    $query = "SELECT `email` FROM `people` WHERE `email` = $userEmail;";
}