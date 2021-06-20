<?php

function getSpecificBookings($email)
{

    $sql = "SELECT * FROM reservations INNER JOIN people ON reservations.People_id=people.id INNER JOIN sessions ON reservations.Sessions_id=sessions.id INNER JOIN movies ON sessions.Movies_id=movies.id INNER JOIN theaters ON sessions.Theaters_id=theaters.id INNER JOIN seats ON seats.Reservations_id=reservations.id WHERE CONCAT(date, \" \",starting_hour) > NOW() AND people.email = \"$email\" ORDER BY sessions.date, sessions.starting_hour asc";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function getNumbersOfSeats($sessionCode)
{

    $sql = "SELECT sessions.Theaters_id, theaters.`columns`, theaters.line FROM sessions INNER JOIN theaters ON sessions.Theaters_id=theaters.id WHERE sessions.session_code = $sessionCode";

    //echo $sql

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function getSessionData($sessionCode)
{

    $sql = "SELECT * FROM seats INNER JOIN reservations ON seats.Reservations_id=reservations.id INNER JOIN sessions ON reservations.Sessions_id = sessions.id WHERE sessions.session_code = $sessionCode";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function writeReservation($people, $session, $reservationId, $seatName = null, $first = true)
{

    if ($first) {

        $sqlReservation = "INSERT INTO reservations (People_id, Sessions_id, reservation_code) VALUES ($people, $session, \"$reservationId\")";

        //echo $sqlReservation;

        require_once "model/dbConnector.php";

        $res1 = executeQueryIUD($sqlReservation);
    } else {

        $sqlSeat = "INSERT INTO seats (Reservations_id, seats.Name) VALUES ($reservationId, \"$seatName\")";

        //echo $sqlSeat;

        require_once "model/dbConnector.php";

        $res2 = executeQueryIUD($sqlSeat);
    }

    $res = @$res1 . @$res2;

    return $res;
}

function getLastReservationId()
{

    $sql = "SELECT reservation_code FROM reservations WHERE id=(SELECT max(id) FROM reservations)";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function getSessionId($sessionCode)
{

    $sql = "SELECT id FROM sessions WHERE session_code = \"$sessionCode\"";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function getAllSessionData($sessionCode)
{

    $sql = "SELECT * FROM sessions INNER JOIN movies ON sessions.Movies_id = movies.id INNER JOIN theaters ON sessions.Theaters_id = theaters.id WHERE sessions.session_code = $sessionCode";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}

function deleteSession($sessionCode){

    $sql = "DELETE FROM sessions WHERE session_code LIKE \"$sessionCode\"";

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;

}