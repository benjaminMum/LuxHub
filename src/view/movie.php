<?php

function showAMovieView($movieData, $movieid)
{

    $title = "Session";
    ob_start();
?>


    <main>
        <section class="py-3 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><?= $movieData[0]['title'] ?></h1>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="<?= $movieData[0]['thumbnails'] ?>" alt="<?= $movieData[0]['title'] ?>">
                    <br>
                    <strong><small>Durée:</small></strong>
                    <p><?= $movieData[0]['duration'] ?></p>
                    <strong> <small>Date de sortie:</small></strong>
                    <p><?= $movieData[0]['release_date'] ?></p>
                    <strong><small>Âge légal:</small></strong>
                    <p><?= $movieData[0]['legal_age'] ?></p>
                </div>
                <div class="col-8">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="720" height="450" src="https://www.youtube.com/embed/u31qwQUeGuM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <strong><small>Description:</small></strong>
                    <p><?= $movieData[0]['description'] ?></p>
                </div>
            </div>
        </div>

    </main>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content);
}
