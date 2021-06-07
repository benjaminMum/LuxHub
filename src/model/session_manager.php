<?php
require "model/dbConnector.php";



/**
 * @return string The new code for the user
 * @Description Generates a new code for an user based on the last generated code
 */
function sessionCode() {
    $query = "SELECT * FROM `luxhub`.`sessions`;";
    $result = executeQuerySelect($query);

    $lastRegister = end($result);
    $lastId =  (int)$lastRegister[3];

    $newId = $lastId + 1;
    $code = (string)$newId;
    return $code;
}


function addSession($addSessionData) {

    $movie= $addSessionData['filmSession'];
    $theater= $addSessionData['sessionTheater'];
    $sessionCode = sessionCode();
    $language = $addSessionData['sessionLanguage'];
    $date =$addSessionData['sessionDate'];
    $hour = $addSessionData['sessionStart'];
    $duration = $addSessionData['sessionDuration'];



    $query = "INSERT INTO `luxhub`.`sessions` (`Movies_id`, `Theaters_id`, `session_code`, `language`,`date`, `starting_hour`, `duration`) VALUES ($movie, $theater, $sessionCode, '$language','$date', '$hour', $duration);";
echo $query;
    return executeQueryIUD($query);
}