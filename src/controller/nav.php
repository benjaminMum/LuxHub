<?php

function home(){
    require_once "model/movies.php";
    $movies = getAllMovies();
    require_once "view/home.php";
    homeView($movies);
}

function login($userData){
    require_once "model/user_manager.php";
    if (isset($userData['loginEmail'])) {
        if(loginUser($userData)) {
            home();
        } else {
            require_once "view/login.php";
            loginView();
        }
    } else {
        require_once "view/login.php";
        loginView();
    }
}

function register($userData){
    require_once "model/user_manager.php";
    if (isset($userData['registerEmail'])) {
        if(verifyUser($userData['registerEmail']) == false) {
            if($userData['registerPsw'] == $userData['registerConfirmPsw']) {
                registerUser($userData);
                home();
            } else {
                $err = "Vérifiez les mots de passes";
                require_once "view/register.php";
                registerView();
            }
        } else {
            $err = "Cet adresse mail est déjà connue";
            require_once "view/register.php";
            registerView();
        }
    } else {
        require_once "view/register.php";
        registerView();
    }

}

function lost(){
    require_once "view/lost.php";
    lostView();
}

function displayAMovie($movieID){

    require_once "model/movies.php";
    $movie = getAMovie($movieID);

    require_once "view/movie.php";
    showAMovieView($movie, $movieID);

}