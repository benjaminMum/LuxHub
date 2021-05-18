<?php
function home(){
    require_once "model/movies.php";
    $movies = getAllMovies();
    require_once "view/home.php";
    homeView($movies);
}
function login($userData){
    if (isset($userData['inputUserEmailAddress'])) {

    } else {
        require_once "view/login.php";
        loginView();
    }
        require_once "view/login.php";


}
function register($userData){
    if (isset($userData['inputNewEmailAddress'])) {

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