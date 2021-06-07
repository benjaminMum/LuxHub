<?php
function soonView($sessions=null,$userRights=null)
{
    $title = "Prochainement";
    $currentNav = "soon";

    // Content
    ob_start();

    ?>

    <?php  //if ($_SESSION['Account_type_id'] = 3) :?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5 ">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Prochaines séances</h1>
            </div>
        </div>

        <?php if(isset($userRights)) :?>
            <?php if($userRights == 4) :?>
                <div class="text-center pb-5">
                    <a href="/addSession" class="btn btn-secondary text-center">Ajouter</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </section>



    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($sessions as $session) :?>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="<?= $session['thumbnails'] ?>" alt="<?= $session['title'] ?>">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $session['title'] ?></h5>
                                        <div class="scrollBox">
                                            <p class="card-text"><?= $session['description'] ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text"><small class="text-muted"><?= $session['duration'] ?> mins</small></p>
                                            <a href="/movie/<?=$session[0]?>" class="btn btn-primary">Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  endforeach; ?>
            </div>
        </div>
    </div>


    <?php //endif; ?>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";
    renderTemplate($title, $content, $currentNav);
}
