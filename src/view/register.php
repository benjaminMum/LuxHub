<?php
function registerView()
{
    $title = "S'enregistrer";
    $currentNav = "register";
    // Content
    ob_start();

    ?>

    <div class="container" >
        <br>
        <h4 align="center" >S'inscrire</h4><br>
<div class=" justify-content-center">
        <form  action="index.php?action=login" method="post">
            <div class="row ">
                <div class="col-2">
                    <label for="inputNewEmailAddress">E-Mail</label>
                    <input type="email" name="inputNewEmailAddress" id="inputNewEmailAddress">
                </div>

                <div class="col-2">
                    <label for="inputNewPsw">Mot de passe</label><br>
                    <input  type="password" name="inputNewPsw" id="inputNewPsw">
                </div>
            </div><br>

            <div class="row">
                <div class="col-2">
                    <label for="inputNewFirstName" >Prénom</label>
                    <input type="text" name="inputNewFirstName" id="inputNewFirstName">
                </div>

                <div class="col-2">
                    <label for="inputConfirmPsw">Confirmer mot de passe</label><br>
                    <input type="password" name="inputConfirmPsw" id="inputConfirmPsw">
                </div>
            </div><br>
            <div class="row">
                <div class="col-2">
                    <label for="inputNewLastName">Nom</label><br>
                    <input type="text" name="inputNewlastName" id="inputNewlastName">
                </div >
                <div class="col-2">
                    <label for="inputNewBirthDate">Date de naissance</label><br>
                    <input type="date" name="inputNewBirthDate" id="inputNewBirthDate">
                </div>
            </div><br>
            <div class="row">
                <div class="col-2 text-end">
                <input type="reset" value="Effacer">
                </div>
                <div class="col-2">
                    <input type="submit" value="S'inscrire">
                </div>
            </div>
            </div>
        </form>
    </div>
    </div>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
