<?php
function soonView()
{
    $films=["bonjour", "aurevoir"];
    $theaters=["bonjoir", "aurivoir"];
    $title = "Prochainement";
    $currentNav = "soon";
// Content
    ob_start();

    ?>
    <?php  if ($_SESSION['Account_type_id'] != 3) {
    ?>
    <div class="align-content-center">
        <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
            <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputFilmSession">Film</label>
                            <select name="filmSession" id="inputFilmSession" required>
                                <?php foreach ($films as $availableFilms) {
                                    ?>
                                    <option value="<?php echo $availableFilms ?>"><?php echo $availableFilms ?></option>

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
                                    <option value="<?php echo $availableTheaters ?>"><?php echo $availableTheaters ?></option>

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
                            <input type="text" name="sessionLanguage" id="inputSessionLanguage" required>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <label for="inputSessionDate">Date de naissance</label><br>
                            <input type="date" name="sessionDate" id="inputSessionDate" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputNewLastName">Nom</label><br>
                            <input type="text" name="registerLastname" id="inputNewLastName" required>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <label for="inputNewBirthDate">Date de naissance</label><br>
                            <input type="date" name="registerBirthdate" id="inputNewBirthDate" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                            <input type="reset" value="Effacer">
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input type="submit" value="S'inscrire">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php
}
    ?>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
