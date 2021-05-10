<?php
function loginView($formDisplay)
{
    $title = "S'enregistrer / Se connecter";
    $currentNav = "login";
    // Content
    ob_start();
    if ($formDisplay=='displayLogin'){
        ?>

        <form action="index.php?action=login" method="post" >
            <h4>
                Se connecter
            </h4>

            <div >
                <label for="inputUserEmailAddress">E-Mail</label>
                <input  type="email" name="inputUserEmailAddress">
            </div>

            <div>
                <label for="inputUserPsw">Mot de passe</label>
                <input  type="password" name="inputUserPsw">
            </div class="md-12">
            <input type="submit" value="Se connecter"> <br>Pas de compte ? <a href="index.php?action=displayRegister" >S'inscrire</a>
            </div>
        </form>
    <?php }else if ($formDisplay=='displayRegister'){?>
        <form action="index.php?action=register" method="post" >
            <h4 >
                S'inscrire
            </h4>
        <?php
    }
    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
