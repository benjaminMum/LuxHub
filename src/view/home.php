<?php

function homeView($movies, $res)
{
    $title = "Accueil";
    $currentNav = "home";
    ob_start();
?>
    <link rel="stylesheet" href="view/css/movies.css">
    <?php
    $head = ob_get_clean();

    // Content
    ob_start();
    ?>

    <main>
        <?php if(isset($res)) : ?>
        <p class="alert alert-success"><?=$res?></p>
        <?php endif;?>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">À la une</h1>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php $i = 0 ?> 
                    <?php foreach ($movies as $movie){?>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="<?= $movie['thumbnails'] ?>" alt="<?= $movie['title'] ?>">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $movie['title'] ?></h5>
                                            <div class="scrollBox">
                                                <p class="card-text"><?= $movie['description'] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text"><small class="text-muted"><?= $movie['duration'] ?> mins</small></p>
                                                <a href="/movie/<?=$movie[0]?>" class="btn btn-primary">Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </main>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav, $head);
}
