<?php

function home($res = null){
    require_once "model/movies.php";
    $movies = getAllMovies();
    require_once "view/home.php";
    homeView($movies, $res);
}

function modifyUser($code, $modifyData) {
    require_once "model/user_manager.php";

    if(isset($_SESSION['email'])) {
        if(isset($code['id'])) {
            if($modifyData['modifyPsw'] == $modifyData['modifyConfirmPsw'])  {
                if(modifyUserDB($code['id'], $modifyData)) {
                    $res = "Vos informations ont bien été modifiées.";
                    home($res);
                }
            } else {
                $err = "Les mots de passes ne correspondent pas.";
                $userData = getUserData($_SESSION['email']);
                require_once "view/modify-user.php";
                modifyUserView($err, $userData);
            }

        } else {
            $userData = getUserData($_SESSION['email']);
            require_once "view/modify-user.php";
            modifyUserView(NULL, $userData);
        }
    } else {
        home();
    }
}

function displayUser() {
    require_once "model/user_manager.php";
    if(isset($_SESSION['email'])) {
        $userData = getUserData($_SESSION['email']);
        require_once "view/user.php";
        userView($userData);
    } else {
        home();
    }

}

function login($userData){
    require_once "model/user_manager.php";
    if (isset($userData['loginEmail'])) {
        if(loginUser($userData)) {
            $_SESSION['email'] = $userData ['loginEmail'];
            home();
        } else {
            require_once "view/login.php";
            $err = "Votre email ou votre mot de passe n'est pas valide.";
            loginView($err);
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
                if (registerUser($userData)){
                    $res = "Vous avez bien été enregistré.";
                    $_SESSION['email'] = $_POST['registerEmail'];
                    home($res);
                }else{
                    $err = "L'insertion dans la base de données a échoué.";
                    registerView($err);
                }
            } else {
                $err = "Les mots de passes ne correspondent pas.";
                require_once "view/register.php";
                registerView($err);
            }
        } else {
            $err = "Cet adresse mail est déjà utilisée.";
            require_once "view/register.php";
            registerView($err);
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

function logout(){

    session_destroy();

    home();

}