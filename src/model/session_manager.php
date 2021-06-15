<?php

/**
 * @file session_manager.php
 * @author Created by nathanaël.collaud@cpnv.ch
 * @version 0.1
 * @date 07.06.2021
 */

require_once "model/dbConnector.php";

function getAllSessions()
{
    $sql = "SELECT * FROM luxhub.sessions INNER JOIN luxhub.movies on luxhub.sessions.Movies_id=luxhub.movies.id 
    WHERE CONCAT(date,\" \",starting_hour) > NOW()
    order by sessions.date, sessions.starting_hour asc";
    return executeQuerySelect($sql);
}

function sessionCode()
{
    $query = "SELECT * FROM `luxhub`.`sessions`;";
    $result = executeQuerySelect($query);

    $lastRegister = end($result);
    $lastId = (int)$lastRegister[3];

    $newId = $lastId + 1;
    $code = (string)$newId;
    return $code;
}

function getAllTheaters()
{
    $sql = "SELECT * FROM `luxhub`.`theaters`;";

    return executeQuerySelect($sql);
}

function getTimeOfTheatre($theatreId)
{
    $query = "SELECT `date`, `starting_hour`, `duration` FROM `luxhub`.`sessions` INNER JOIN `Luxhub`.`theaters` ON `sessions`.`Theaters_id` = `theaters`.`id` WHERE `theaters`.`id` = $theatreId";
    //echo $query;

    return executeQuerySelect($query);
}

function addSessionBD($addSessionData)
{

    $movie = $addSessionData['filmSession'];
    $theater = $addSessionData['sessionTheatre'];
    $sessionCode = sessionCode();
    $language = $addSessionData['sessionLanguage'];
    $date = $addSessionData['sessionDate'];
    $hour = $addSessionData['sessionStart'];
    $duration = $addSessionData['sessionDuration'];

    $query = "INSERT INTO `luxhub`.`sessions` (`Movies_id`, `Theaters_id`, `session_code`, `language`,`date`, `starting_hour`, `duration`) VALUES ($movie, $theater, $sessionCode, '$language','$date', '$hour', $duration);";

    return executeQueryIUD($query);
}

function getSessionsFromMovie($movieId)
{

    $sql = "SELECT * FROM luxhub.sessions INNER JOIN luxhub.movies on luxhub.sessions.Movies_id=luxhub.movies.id WHERE CONCAT(date, \" \",starting_hour) > NOW() AND movie_code = $movieId ORDER BY sessions.date, sessions.starting_hour asc";

    $res = executeQuerySelect($sql);

    return $res;
}
