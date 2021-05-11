<?php
function home(){
    require_once "view/home.php";
    homeView();
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

}