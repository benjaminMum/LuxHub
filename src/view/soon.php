<?php
function soonView( $sessions=null,$films=null,$theaters=null)
{
    $title = "Prochainement";
    $currentNav = "soon";
// Content
    ob_start();

    ?>
    <?php  //if ($_SESSION['Account_type_id'] = 3) {
    ?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Prochaines séances</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($sessions as $session){?>
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
                <?php  } ?>
            </div>
        </div>
    </div>

    <div class="align-content-center" xmlns:min="http://www.w3.org/1999/xhtml">
        <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
            <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center" >
                <form action="/soon" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputFilmSession" >Film</label><br>
                            <select name="filmSession" id="inputFilmSession" class="col-12" required>
                                <?php foreach ($films as $availableFilms) {
                                    ?>
                                    <option value="<?php echo $availableFilms[0]  ?>"><?php echo $availableFilms[2] ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionTheater">Salle</label><br>
                            <select name="sessionTheater" id="inputSessionTheater" required>
                                <?php foreach ($theaters as $availableTheaters) {
                                    ?>
                                    <option value="<?php echo $availableTheaters[0] ?>"><?php echo $availableTheaters[1] ?></option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionLanguage">Langue</label>
                            <input type="text" name="sessionLanguage" placeholder="Par ex. FR" id="inputSessionLanguage" required>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionDate">Date de la séance</label><br>
                            <input type="date" name="sessionDate" id="inputSessionDate" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionStart">Début de la séance</label><br>
                            <input type="time" name="sessionStart" id="inputSessionStart" min="10:00" max="23:00" required >
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionDuration">Durée</label><br>
                            <input type="number" name="sessionDuration" id="inputSessionDuration" min="30" max="43200" required placeholder="En minutes">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                            <input type="reset" value="Effacer">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input type="submit" value="Ajouter">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php
//}
    ?>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
