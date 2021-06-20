<?php
function contactView($err = null)
{
    $title = "Nous contacter";
    // Content
    ob_start();

?>
    <div class="container">

        <br>
        <div class="text-center">
            <h4>Contactez-nous</h4>
        </div>
        <br>

        <div class="container w-25 justify-content-center">
            <form action="/contact" method="post" class="pt-3 pb-3 justify-content-center">
                <div>
                    <?php if (@isset($err)) { ?>
                        <p class="alert alert-danger"><?= $err ?></p>
                    <?php } ?>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="pb-3">
                        <label for="mailMessage">Message:</label><br>
                        <textarea name="mailMessage" id="mailMessage" cols="40" rows="10"></textarea>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md-2 col-sm-2 text-center">
                        <input type="submit" value="Envoyer" class="justify-content-center" tabindex="3">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content);
}
