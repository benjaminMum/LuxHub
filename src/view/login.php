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
        <div class="text-center"><h4 >Se connecter</h4></div>
        <br>

        <div class="container border  w-25 justify-content-center">
            <form action="/login" method="post" class="pt-3 pb-3 justify-content-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-8 pb-3">
                        <label for="inputUserEmailAddress">E-Mail</label><br>
                        <input  type="email" name="loginEmail" id="inputUserEmailAddress">
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-8 pb-3">
                        <label for="inputUserPsw">Mot de passe</label><br>
                        <input  type="password" name="loginPsw" id="inputUserPsw">
                    </div>
                </div>

                <br>

                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <p>Pas de compte ? <a href="/register" >S'inscrire</a></p>
                    </div>
                </div>

                <br>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 col-md-2 col-sm-2 text-center">
                        <input type="submit" value="Se connecter" class="justify-content-center">
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
