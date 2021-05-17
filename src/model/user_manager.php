<?php
/**
 * @author : Benjamin Muminovic
 * @description : Contains all the functions to manage users in the database
 *
 */

require "model/dbConnector.php";

/**
 * @return string The new code for the user
 * @Description Generates a new code for an user based on the last generated code
 */
function generateId() {
    $query = "SELECT * FROM `luxhub`.`people`;";
    $result = executeQuerySelect($query);

    $lastRegister = end($result);
    $lastId =  (int)$lastRegister[2];

    $newId = $lastId++;
    return (string)$newId;
}

/**
 * @param array $registerData
 * @description Registers an user in the database with the information given
 * @return bool True if the execution worked, false otherwise
 */
function registerUser($registerData) {
    // By default the account type should be a member
    $accountType = 1;
    // Generates a new code for the client
    $clientCode = generateId();
    // Hashes the password
    $password = password_hash($registerData["password"], PASSWORD_DEFAULT);


    //TODO change the name of registerData's array names in the query
    $lastname = $registerData['lastname'];
    $firstname = $registerData['firstname'];
    $email = $registerData['email'];
    $birthdate = $registerData['birthdate'];

    $query = "INSERT INTO `luxhub`.`people` (`Account_type_id`, `client_code`, `lastname`, `firstname`, `email`, `password`, `birthdate`) VALUES ($accountType, $clientCode, $lastname, $firstname, $email, $password, $birthdate);";

    return executeQueryIUD($query);
}

/**
 * @param $userEmail
 * @return bool Returns true if the user already exists, false otherwise.
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

function loginUser($loginData) {
    $userMail = $loginData['email'];
    $query = "SELECT `password` FROM `people` WHERE `email` = $userMail;";
    $result = executeQuerySelect($query);

    $pswVerif = password_verify($loginData['password'], $result[0][0]);

    if($pswVerif) {
        $success = true;
    } else {
        $success = false;
    }

    return $success;

}