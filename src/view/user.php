<?php

function userView($uData)
{
    $title = "Utilisateur";
    $currentNav = "login";
    // Content
    ob_start();

?>
    <link rel="stylesheet" href="view/css/user.css">

<div class="container pt-5 align-content-center">
    <h2 class="text-center">Votre compte</h2>

    <div class="pt-4 mx-auto col-4 text-center">
        <p class="name-style"><?= $uData['firstname']?> <?= $uData['lastname']?></p>
        <p>E-Mail : <?= $uData['email']?></p>

        <p>Date de naissance : <?= $uData['birthdate']?></p>
        <button class="btn btn-secondary text-center"><a href="/modifyUser" class="text-white">Modifier</a></button>
    </div>


</div>

<?php

$content = ob_get_clean();

require_once "view/template.php";

renderTemplate($title, $content, $currentNav);
}
