<?php

/**
 * @file movies.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1
 * @date 17.0.2021
 */


function getAllTheaters (){

    $sql = "SELECT * FROM theaters";

    //echo $sql;

    require_once "model/dbConnector.php";

    $res = executeQuerySelect($sql);

    return $res;

}

