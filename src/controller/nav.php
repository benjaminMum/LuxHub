<?php

function home($res = null)
{
    require_once "model/movies.php";
    $movies = getAllMovies();
    require_once "view/home.php";
    homeView($movies, $res);
}

function modifyUser($code, $modifyData)
{
    require_once "model/user_manager.php";

    if (isset($_SESSION['email'])) {
        if (isset($code['id'])) {
            if ($modifyData['modifyPsw'] == $modifyData['modifyConfirmPsw']) {
                if (modifyUserDB($code['id'], $modifyData)) {
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

function displayUser()
{
    require_once "model/user_manager.php";
    if (isset($_SESSION['email'])) {
        $userData = getUserData($_SESSION['email']);
        require_once "view/user.php";
        userView($userData);
    } else {
        home();
    }
}

function showUsers($search = null)
{
    require_once "model/user_manager.php";
    require_once "view/manage-users.php";

    $types = getAllTypes();

    if (isset($search)) {
        $getUserData = getUsers($search);
    } else {
        $getUserData = getUsers();
    }
    if (isset($_SESSION) && $_SESSION['type'] == 4) {
        getUsersView($getUserData, $types);
    } else {
        home();
    }
}

function modifyUserType($user, $newType)
{
    require_once "model/user_manager.php";
    if (modifyUserTypeBD($user, $newType)) {
        showUsers();
    } else {
        $err = "Une erreur est survenue.";
        showUsers();
    }
}

function login($userData)
{
    require_once "model/user_manager.php";
    if (isset($userData['loginEmail'])) {
        if (loginUser($userData)) {
            $_SESSION['email'] = $userData['loginEmail'];
            $userRight = getUserType($userData['loginEmail']);
            $_SESSION['type'] = $userRight[0][0];
            soon();
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
                    $userRight = getUserType($userData['loginEmail']);
                    $_SESSION['type'] = $userRight[0][0];
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

function compareTime($theatreTime, $formD)
{
    $available = true;
    $formDate = $formD['sessionDate'];

    $formDuration = $formD['sessionDuration'];
    $endTimeForm = date("H:i", strtotime("+$formDuration minutes", strtotime($formD['sessionStart'])));

    foreach ($theatreTime as $tData) {
        // gets the end of the session
        $endTimeDB = date("H:i", strtotime("+$tData[2] minutes", strtotime($tData[1])));
        // only gets the session of form date
        if ($tData[0] == $formDate) {
            // OK if the form starting time and the form ending time are before the starting of the session
            if ((strtotime($formD['sessionStart']) < $tData[1]) && ($endTimeForm < $tData[1])) {
                $available = true;
                // OK if the form starting time is after the ending time of the session
            } elseif (strtotime($formD['sessionStart']) >= strtotime($endTimeDB)) {
                $available = true;
            } else {
                $available = false;
                break;
            }
        }
    }
    return $available;
}

function addSession($addSessionData)
{
    require_once "model/session_manager.php";
    require_once "model/movies.php";
    require_once "view/add_session.php";

    $films = getAllMovies();
    $theaters = getAllTheaters();
    $currentDate = date('Y-m-d');

    if (isset($addSessionData['filmSession'])) {
        $formDate = $addSessionData['sessionDate'];
        $theatreTime = getTimeOfTheatre((int)$addSessionData['sessionTheatre']);

        if ($formDate > $currentDate) {
            // gets the time information of all the sessions using the same theatre
            $available = compareTime($theatreTime, $addSessionData);
        } elseif ($formDate == $currentDate) {
            date_default_timezone_set('Europe/Paris');
            $currentTime = date('H:i');

            if ($addSessionData['sessionStart'] > $currentTime) {
                $available = compareTime($theatreTime, $addSessionData);
            } else {
                $error = "L'heure fournie est déjà passée";
                addSessionView($films, $theaters, $error);
            }
        } else {
            $error = "La date fournie est déjà passée";
            addSessionView($films, $theaters, $error);
        }

        // verification
        if (isset($available)) {
            if ($available == true) {
                addSessionBD($addSessionData);
                soon();
            } else {
                $error = "La salle est déjà utilisée à cette heure là";
                addSessionView($films, $theaters, $error);
            }
        }
    } else {
        addSessionView($films, $theaters);
    }
}

function soon($movieCode = null)
{
    require_once "model/session_manager.php";
    require_once "view/soon.php";
    if ($movieCode) {
        $sessions = getSessionsFromMovie($movieCode);
    } else {
        $sessions = getAllSessions();
    }
    if (isset($_SESSION['email'])) {
        soonView($sessions, $_SESSION['type']);
    } else {
        soonView($sessions);
    }
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

function myBookings()
{

    require_once "model/bookings.php";

    $bookings = getSpecificBookings($_SESSION['email']);

    require_once "view/reservation.php";

    reservationView($bookings);
}

function createBooking($sessionCode)
{

    require_once "model/bookings.php";

    $rowLine = getNumbersOfSeats($sessionCode);

    $data = getSessionData($sessionCode);

    require_once "view/makeAReservation.php";

    showBooking($rowLine, $data);
}

function writeBooking($reservationData)
{

    require_once "model/bookings.php";

    require_once "model/user_manager.php";

    $people = getUserData($reservationData['email']);

    $lastResId = getLastReservationId();

    $reservationID = 1;

    $reservationID += $lastResId[0]['reservation_code'];

    $seats = explode(",", $reservationData['seats']);

    $sessionId = getSessionId($reservationData['session_code']);

    writeReservation($people['id'], $sessionId[0]['id'], $reservationID);

    foreach ($seats as $seat) {

        writeReservation($people['id'], $sessionId[0]['id'], $reservationID, $seat, false);
    }

    require_once "controller/mail.php";

    $subject = "Confirmation de réservation.";
    $message = "Bonjour, votre réservation a bien été éffectuée.";
    sendConfirmationMail($_SESSION['email'], $subject, $message);

    myBookings();
}

function displayASession($sessionCode)
{

    require_once "view/session.php";

    require_once "model/bookings.php";

    $data = getAllSessionData($sessionCode);

    showASession($data);
}

function deleteASession($sessionCode)
{

    require_once "model/bookings.php";

    deleteSession($sessionCode);

    header("Location:/soon");
}

function contactUs($message){

    if($message){

        require_once "controller/mail.php";

        sendMail($message['mailMessage']);

        $res = "Votre email a bien été enovyé.";

        home($res);

    }else{

        require_once "view/contact.php";

        contactView();

    }

}