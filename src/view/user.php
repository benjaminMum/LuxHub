<?php

function userView($uData)
{
    $title = "Utilisateur";
    $currentNav = "login";
    // Content
    ob_start();

?>

    <h2>User page</h2>

    <button><a href="/modifyUser">Modifier</a></button>

    <p><?= $uData['email']?></p>
    <p><?= $uData['firstname']?></p>
    <p><?= $uData['lastname']?></p>
    <p><?= $uData['birthdate']?></p>


<?php

$content = ob_get_clean();

require_once "view/template.php";

renderTemplate($title, $content, $currentNav);
}
