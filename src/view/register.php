<?php
function registerView()
{
    $title = "S'enregistrer";
    $currentNav = "register";
    // Content
    ob_start();

    ?>

    <div class="container">
        <br>
        <div class="text-center"><h4 >S'inscrire</h4></div>
        <br>

        <div class="align-content-center">
            <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
                <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center">
                    <form action="/register" method="post" >
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewEmailAddress">E-Mail</label>
                                <input type="email" name="inputNewEmailAddress" id="inputNewEmailAddress" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewPsw">Mot de passe</label><br>
                                <input type="password" name="inputNewPsw" id="inputNewPsw" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewFirstName">Prénom</label>
                                <input type="text" name="inputNewFirstName" id="inputNewFirstName" required>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label for="inputConfirmPsw">Confirmer mot de passe</label><br>
                                <input type="password" name="inputConfirmPsw" id="inputConfirmPsw" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewLastName">Nom</label><br>
                                <input type="text" name="inputNewLastName" id="inputNewLastName" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewBirthDate">Date de naissance</label><br>
                                <input type="date" name="inputNewBirthDate" id="inputNewBirthDate" required>
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
    </div>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
