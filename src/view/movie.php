<?php

/**
 * @file aMovie.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1 / 18.05.2021
 */

function showAMovieView($movie, $movieID)
{

    $title = $movie[0]['title'];
    ob_start();
?>

    <!-- <pre>
    <?= print_r($movie) ?>
    </pre> -->
    <div>
        <div class="d-flex justify-content-center">
            <div>

                <img src=" <?= $movie[0]['thumbnails'] ?>" alt="<?= $movie[0]['title'] ?>">

            </div>

            <div class="embed-responsive embed-responsive-16by9">

                <iframe class="embed-responsive-item" width="1280" height="720" src="https://www.youtube.com/embed/u31qwQUeGuM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
        </div>
    </div>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content);
}
