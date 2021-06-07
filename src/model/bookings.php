<?php

function getSpecificBookings($email)
{

    $sql = "SELECT * FROM reservations INNER JOIN people ON reservations.People_id=people.id INNER JOIN sessions ON reservations.Sessions_id=sessions.id INNER JOIN movies ON sessions.Movies_id=movies.id INNER JOIN theaters ON sessions.Theaters_id=theaters.id INNER JOIN seats ON seats.Reservations_id=reservations.id WHERE people.email = \"$email\"";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;
}
