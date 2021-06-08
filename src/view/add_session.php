<?php

function addSessionView($films=null,$theaters=null)
{
    $title = "Ajouter une session";
    $currentNav = "add_session";

    // Content
    ob_start();

    ?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Ajouter une séance</h1>
            </div>
        </div>
    </section>

    <div class="align-content-center" xmlns:min="http://www.w3.org/1999/xhtml">
        <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
            <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center" >
                <form action="/addSession" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputFilmSession" >Film</label><br>
                            <select name="filmSession" id="inputFilmSession" class="col-12" tabindex="1" required>
                                <?php foreach ($films as $availableFilms) :?>
                                    <option value="<?= $availableFilms[0]  ?>"><?= $availableFilms[2] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionTheater">Salle</label><br>
                            <select name="sessionTheater" id="inputSessionTheater" tabindex="4" class="col-8" required>
                                <?php foreach ($theaters as $availableTheaters) :?>
                                    <option value="<?= $availableTheaters[0] ?>"><?= $availableTheaters[1] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionLanguage">Langue</label>
                            <input type="text" name="sessionLanguage" placeholder="Par ex. FR" id="inputSessionLanguage" tabindex="2" maxlength="2" required>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionDate">Date de la séance</label><br>
                            <input type="date" name="sessionDate" id="inputSessionDate" tabindex="5" class="col-8" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionStart">Début de la séance</label><br>
                            <input type="time" name="sessionStart" id="inputSessionStart" min="10:00" max="23:00" tabindex="3" class="col-8" required >
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionDuration">Durée</label><br>
                            <input type="number" name="sessionDuration" id="inputSessionDuration" min="30" max="43200" class="col-6" tabindex="6" placeholder="En minutes" required>
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

    $content = ob_get_clean();

    require_once "view/template.php";
    renderTemplate($title, $content, $currentNav);
}
