<?php

require "model/dbConnector.php";

/**
 * @param array $registerData
 * @description Registers an user in the database with the information given
 * @return  bool
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

    // Date format for database "YYYY-MM-DD"
    $birthdate = $registerData['birthdate'];

    $query = "INSERT INTO `luxhub`.`people` (`Account_type_id`, `client_code`, `lastname`, `firstname`, `email`, `password`, `birthdate`) VALUES ($accountType, $clientCode, $lastname, $firstname, $email, $password, $birthdate);";

    return executeQueryIUD($query);
}

/**
 * @param $userEmail
 * @return bool Returns true if the user already exists, false in the opposite case.
 */
function verifyUser($userEmail) {
    $query = "SELECT `email` FROM `people` WHERE `email` = $userEmail;";
    $result = executeQuerySelect($query);

    if ($result[0][0] == $userEmail) {
        $success = true;
    } else {
        $success = false;
    }

    return $success;
}