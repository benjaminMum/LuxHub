<?php
function registerView($err = null)
{
    $title = "S'enregistrer";
    $currentNav = "register";
    // Content
    ob_start();

?>

    <div class="container">
        <br>
        <div class="text-center">
            <h4>S'inscrire</h4>
        </div>
        <br>
        <div>
            <?php if (@isset($err)) : ?>
                <p class="alert alert-danger"><?= $err ?></p>
            <?php endif; ?>
        </div>
        <div class="align-content-center">
            <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
                <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center">
                    <form action="/register" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewEmailAddress">E-Mail</label>
                                <input type="email" name="registerEmail" id="inputNewEmailAddress" tabindex="1" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewPsw">Mot de passe</label><br>
                                <input type="password" name="registerPsw" id="inputNewPsw" tabindex="4" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewFirstName">Prénom</label>
                                <input type="text" name="registerFirstname" id="inputNewFirstName" tabindex="2" required>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label for="inputConfirmPsw">Confirmer mot de passe</label><br>
                                <input type="password" name="registerConfirmPsw" id="inputConfirmPsw" tabindex="5" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewLastName">Nom</label><br>
                                <input type="text" name="registerLastname" id="inputNewLastName" tabindex="3" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewBirthDate">Date de naissance</label><br>
                                <input type="date" name="registerBirthdate" id="inputNewBirthDate" tabindex="6" max="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                                <input type="reset" value="Effacer">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="submit" value="S'inscrire" tabindex="7">
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
