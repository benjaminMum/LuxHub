<?php

/**
 * @file movies.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1
 * @date 17.0.2021
 */


function getAllSessions (){

    $sql = "SELECT * FROM luxhub.sessions INNER JOIN luxhub.movies on luxhub.sessions.Movies_id=luxhub.movies.id order by sessions.date, sessions.starting_hour asc";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;

}