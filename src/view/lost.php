<?php
function lostView()
{

    ob_start();
    $title = "404";

?>
    <img src="view/content/icons/404.svg" style="height: 18rem; margin-left: auto; margin-right: auto; display: block;">
    <h1 class="mx-auto pt-5" style="width:fit-content;">404 : Page not found</h1>
<?php

    $content = ob_get_clean();
    require_once "view/template.php";
    renderTemplate($title, $content);
}
