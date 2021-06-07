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
            $_SESSION['email'] = $userData['loginEmail'];
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

    header("location:/home");
    
}

function addMovie($movieData, $files)
{

    $success = false;

    require_once "view/addMovie.php";
    if (!empty($movieData)) {
        if (!empty($movieData["movieID"])) {
            if (!empty($movieData["movieTitle"])) {
                if (!empty($movieData["movieReleaseDate"])) {
                    if (!empty($movieData["movieDuration"])) {
                        if (!empty($movieData["movieDescription"])) {
                            if (!empty($movieData["movieLegalAge"])) {
                                if (!empty($movieData['movieTrailer'])) {
                                    require_once "model/movies.php";
                                    if (!isMovieAlreadyExist($movieData["movieID"])) {
                                        // Save images
                                        require_once "model/imagesManager.php";
                                        $index = 0;
                                        foreach ($files as $file) {
                                            $result = saveImage($file, $movieData["movieID"]);
                                            if ($result != 0) {
                                                $imageNames[$index] = $result;
                                                $index++;
                                            }
                                        }
                                        writeAMovie($movieData);
                                        $success = true;
                                        home($res = "Le film a bien été ajouté");
                                    } else {
                                        addMovieView($err = "L'EIDR du film existe déjà");
                                    }
                                } else {
                                    addMovieView($err = "Veuillez ajouter un lien vers la bande-annonce");
                                }
                            } else {
                            }
                        } else {
                            addMovieView($err = "Veuillez ajouter une description");
                        }
                    } else {
                        addMovieView($err = "Veuillez ajouter la durée du film");
                    }
                } else {
                    addMovieView($err = "Veuillez ajouter la date de sortie du film");
                }
            } else {
                addMovieView($err = "Veuillez ajouter le titre du film");
            }
        } else {
            addMovieView($err = "Veuillez ajouter l'EIDR du film");
        }
    } else {
        addMovieView();
    }
}
