<?php

function home(){
    require_once "view/home.php";
    homeView();
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

}