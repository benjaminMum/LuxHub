<?php
function loginView()
{
    $title = "Se connecter";
    $currentNav = "login";
    // Content
    ob_start();

        ?>
    <div class="container">
        <br>
        <h4 align="center">Se connecter</h4><br>
        <form class="leave-comment" action="index.php?action=login" method="post" >


            <div class="row d-flex justify-content-center">
                <div class="col-sm-2">
                <label for="inputUserEmailAddress">E-Mail</label><br>
                <input  type="email" name="inputUserEmailAddress" id="inputUserEmailAddress">
            </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-2">

                <label for="inputUserPsw">Mot de passe</label><br>
                <input  type="password" name="inputUserPsw" id="inputUserPsw">
            </div >
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-2">
            Pas de compte ? <a href="/register" >S'inscrire</a>
                </div>
            </div>
                    <br>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-2" align="center">
                    <input type="submit" value="Se connecter">
                </div>
            </div>
        </form>
    </div>
        <?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
