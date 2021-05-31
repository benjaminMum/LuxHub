<?php

/**
 * @file index.php
 * @brief This is the router, it handles requests and redirect them to the correct controller
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1 / 29.04.2021
 */

// Creates/Resumes a sessions
session_start();

// Dependencies
require_once "controller/nav.php";

// Routing
switch (strtok($_SERVER["REQUEST_URI"], '?')) {
    
    default:
        lost();
        break;
    
    case '/':
        home();
        break;
    
    case '/home':
        home();
        break;

    case '/login':
        login($_POST);
        break;

    case '/register':
        register($_POST);
        break;

    case (preg_match('/^\/movie\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        displayAMovie($res[1]);
        break;

    case '/logout':
        logout();
        break;

    case '/addMovie':
        addMovie(@$_POST, @$_FILES);
        break;
}