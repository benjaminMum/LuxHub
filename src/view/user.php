<?php

function userView($err = null)
{
    $title = "Utilisateur";
    $currentNav = "login";
    // Content
    ob_start();

?>


<h2>User page</h2>

<?php

$content = ob_get_clean();

require_once "view/template.php";

renderTemplate($title, $content, $currentNav);
}
