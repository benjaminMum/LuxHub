<?php

function modifyUserView($err = null, $uData)
{
    $title = "Modifier";
    $currentNav = "modif";
    // Content
    ob_start();

?>

    <div class="container">
        <br>
        <div class="text-center">
            <h4>Modifier</h4>
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
                    <form action="/modifyUser?id=<?= $uData['client_code']?>" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewEmailAddress">E-Mail</label>
                                <input type="email" name="modifyEmail" id="inputNewEmailAddress" value="<?= $uData['email']?>" tabindex="1" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewPsw">Mot de passe</label><br>
                                <input type="password" name="modifyPsw" id="inputNewPsw" tabindex="4" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewFirstName">Prénom</label>
                                <input type="text" name="modifyFirstname" id="inputNewFirstName" value="<?= $uData['firstname']?>" tabindex="2" required>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label for="inputConfirmPsw">Confirmer mot de passe</label><br>
                                <input type="password" name="modifyConfirmPsw" id="inputConfirmPsw" tabindex="5" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewLastName">Nom</label><br>
                                <input type="text" name="modifyLastname" id="inputNewLastName" value="<?= $uData['lastname']?>" tabindex="3" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewBirthDate">Date de naissance</label><br>
                                <input type="date" name="modifyBirthdate" id="inputNewBirthDate" value="<?= $uData['birthdate']?>" tabindex="6" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                                <input type="reset" value="Effacer">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="submit" value="Modifier">
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
