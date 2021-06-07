<?php

function home($res = null)
{
    require_once "model/movies.php";
    $movies = getAllMovies();
    require_once "view/home.php";
    homeView($movies, $res);
}

function login($userData)
{
    require_once "model/user_manager.php";
    if (isset($userData['loginEmail'])) {
        if (loginUser($userData)) {
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

function register($userData)
{
    require_once "model/user_manager.php";
    if (isset($userData['registerEmail'])) {
        if (verifyUser($userData['registerEmail']) == false) {
            if ($userData['registerPsw'] == $userData['registerConfirmPsw']) {
                if (registerUser($userData)) {
                    $res = "Vous avez bien été enregistré.";
                    $_SESSION['email'] = $_POST['registerEmail'];
                    home($res);
                } else {
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

function lost()
{
    require_once "view/lost.php";
    lostView();
}

function displayAMovie($movieID)
{
    require_once "model/movies.php";
    $movie = getAMovie($movieID);

    require_once "view/movie.php";
    showAMovieView($movie, $movieID);
}

function logout()
{
    session_destroy();
    home();
}

function addSession($addSessionData) {
    require_once "model/session_manager.php";
    require_once "model/movies.php";

    $films = getAllMovies();
    $theaters = getAllTheaters();

    if (isset($addSessionData['filmSession'])) {
        addSessionBD($addSessionData);
        soon();
    } else {
        require_once "view/add_session.php";
        addSessionView($films, $theaters);
    }
}

function soon()
{
    require_once "model/user_manager.php";
    require_once "model/session_manager.php";
    require_once "view/soon.php";

    $sessions = getAllSessions();

    if(isset($_SESSION['email'])) {
        $userRight = getUserType($_SESSION['email']);
        soonView($sessions, $userRight[0][0]);
    } else {
        soonView($sessions);
    }

}