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

    $newId = $lastId + 1;
    $code = (string)$newId;
    return $code;
}

/**
 * @param array $registerData
 * @description Registers an user in the database with the information given
 * @return bool True if the execution worked, false otherwise
 */
function registerUser($registerData) {
    // By default the account type should be a member
    $accountType = 1;
    // Generates a new code for the user
    $clientCode = generateId();
    // Hashes the password
    $password = password_hash($registerData["registerPsw"], PASSWORD_DEFAULT);

    $lastname = $registerData['registerLastname'];
    $firstname = $registerData['registerFirstname'];
    $email = $registerData['registerEmail'];
    $birthdate = $registerData['registerBirthdate'];

    $query = "INSERT INTO `luxhub`.`people` (`Account_type_id`, `client_code`, `lastname`, `firstname`, `email`, `password`, `birthdate`) VALUES ($accountType, '$clientCode', '$lastname', '$firstname', '$email', '$password', '$birthdate');";

    return executeQueryIUD($query);
}

function getUserData($userMail) {
    $query = "SELECT * FROM `people` WHERE `email` = '$userMail';";
    $userData = executeQuerySelect($query);

    return $userData[0];
}

function modifyUserDB($userId, $modifyData) {

    $password = password_hash($modifyData["modifyPsw"], PASSWORD_DEFAULT);

    $lastname = $modifyData['modifyLastname'];
    $firstname = $modifyData['modifyFirstname'];
    $email = $modifyData['modifyEmail'];
    $birthdate = $modifyData['modifyBirthdate'];

    $query = "UPDATE `people` SET `lastname` = '$lastname', `firstname` = '$firstname', `email` = '$email', `password` = '$password', `birthdate` = '$birthdate' WHERE `client_code` = '$userId';";
    $success = executeQueryIUD($query);

    return $success;
}

/**
 * @param $userEmail
 * @return bool Returns true if the user already exists, false otherwise.
 */
function verifyUser($userEmail) {
    $query = "SELECT `email` FROM `people` WHERE `email` = '$userEmail';";
    $result = executeQuerySelect($query);

    if ($result != NULL) {
        $success = true;
    } else {
        $success = false;
    }

    return $success;
}

/**
 * @param $loginData array Contains the data of the login form
 * @return bool True if the login is successful, false otherwise
 */
function loginUser($loginData) {
    $userMail = $loginData['loginEmail'];
    $query = "SELECT `password` FROM `people` WHERE `email` = '$userMail';";
    $result = executeQuerySelect($query);
    if($result != NULL) {
        $pswVerif = password_verify($loginData['loginPsw'], $result[0][0]);

        if($pswVerif) {
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $success = false;
    }

    return $success;

}