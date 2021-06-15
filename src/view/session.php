<?php

function showASession($sessionData)
{

    $title = "Session";
    ob_start();
?>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><?= $sessionData[0]['title'] ?></h1>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="<?= $sessionData[0]['thumbnails'] ?>" alt="<?= $sessionData[0]['title'] ?>">
                    <br>
                    <strong><small>Durée:</small></strong>
                    <p><?= $sessionData[0]['duration'] ?></p>
                    <strong> <small>Langue:</small></strong>
                    <p><?= $sessionData[0]['language'] ?></p>
                    <strong><small>Date:</small></strong>
                    <p><?= $sessionData[0]['date'] ?></p>
                    <strong><small>Heure de début:</small></strong>
                    <p><?= $sessionData[0]['starting_hour'] ?></p>
                    <strong> <small>Date de sortie:</small></strong>
                    <p><?= $sessionData[0]['release_date'] ?></p>
                    <strong><small>Âge légal:</small></strong>
                    <p><?= $sessionData[0]['legal_age'] ?></p>
                    <strong> <small>Nom de la salle:</small></strong>
                    <p><?= $sessionData[0]['name'] ?></p>
                </div>
                <div class="col-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="720" height="450" src="https://www.youtube.com/embed/u31qwQUeGuM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <strong><small>Description:</small></strong>
                    <p><?= $sessionData[0]['description'] ?></p>
                    <form action="/createBooking/<?= $sessionData[0]['session_code'] ?>" method="POST">
                            <input type="submit" value="Réserver">
                    </form>
                </div>
            </div>
        </div>

    </main>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content);
}
