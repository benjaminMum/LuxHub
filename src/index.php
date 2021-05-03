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

}