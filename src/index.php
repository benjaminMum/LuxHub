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
        testInput($_POST);
        login($_POST);
        break;

    case '/register':
        testInput($_POST);
        register($_POST);
        break;

    case (preg_match('/^\/movie\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        displayAMovie($res[1]);
        break;

    case '/soon':
        soon();
        break;

    case '/addSession':
        testInput($_POST);
        addSession($_POST);
        break;

    case '/user':
        displayUser();
        break;

    case '/modifyUser':
        testInput($_POST);
        modifyUser($_GET, $_POST);
        break;

    case '/modifyUserType':
        testInput($_POST);
        modifyUserType($_GET['userId'], $_POST['userType']);
        break;

    case '/showUsers':
        testInput($_POST);
        showUsers($_GET['search']);
        break;

    case '/logout':
        logout();
        break;

    case '/addMovie':
        testInput($_POST);
        addMovie(@$_POST, @$_FILES);
        break;

    case '/myBookings':
        myBookings();
        break;

    case (preg_match('/^\/createBooking\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        createBooking($res[1]);
        break;

    case '/writeBooking':
        testInput($_POST);
        writeBooking($_POST);
        break;

    case (preg_match('/^\/session\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        displayASession($res[1]);
        break;
    
    case (preg_match('/^\/soon\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        soon($res[1]);
        break;
        
    case (preg_match('/^\/deleteSession\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        deleteASession($res[1]);
        break;
        
    case '/contact':
        testInput($_POST);
        contactUs(@$_POST);
        break;

    case (preg_match('/^\/deleteUser\/(\d+)\/?$/', $_SERVER["REQUEST_URI"], $res) ? true : false):
        deleteUser($res[1]);
        break;
}
