<?php

/**
 * @file movies.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1
 * @date 17.0.2021
 */


 function getAllMovies (){

    $sql = "SELECT * FROM movies";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;

 }

 function getAMovie($movieID){

   $sql = "SELECT * FROM movies WHERE movie_code = $movieID";

   //echo $sql;

   require_once "model/dbConnector.php";

   $res = executeQuerySelect($sql);

   return $res;

 }