<?php

/**
 * @file template.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1 / 29.04.2021
 */

function renderTemplate($title = null, $content = null, $currentNav = null, $head = null, $favicon = null)
{
    ?>
    <!DOCTYPE html>
    <html lang="fr" class="h-100">
    <meta charset="UTF-8">
    <head>


        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="/node_modules/jquery/dist/jquery.min.js"></script>

        <?php /** Bootstrap */ ?>
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">

        <?php /** Favicon with default value */ ?>
        <link rel="icon" href="<?= $favicon ?? "/view/content/icons/favicon.svg" ?>" type="image/svg+xml">

        <?php /** View defined title */ ?>
        <title><?= $title ?? "bad dev forgot to put a title" ?></title>

        <?php /** Fixed navbar requires padding to avoid overlap */ ?>
        <style>
            body {
                padding: 56px 0 0 0;
            }
        </style>

        <?= $head ?>

    </head>

    <body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand" href="/home">
                    <img src="/view/content/icons/favicon.svg" width="30" height="24"
                         class="d-inline-block align-text-top">
                    LuxHub
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav col-12 col-md-4">
                        <li class="nav-item">
                            <a class="nav-link <?= (@$currentNav == "home") ? "active" : "" ?>" aria-current="page"
                               href="/home">Accueil</a>
                        </li>
                        <li>
                            <a class="nav-link <?= (@$currentNav == "soon") ? "active" : "" ?>" aria-current="page"
                               href="/soon">Prochainement</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link<?= (@$currentNav == "myBookings") ? "active" : "" ?>"
                               aria-current="page">Mes réservations</a>
                        </li>
                    </ul>
                    <div class="col-12 col-md-8 d-flex justify-content-md-end mt-2 mt-md-0 gx-0">
                        <?php if (empty($_SESSION)) { ?>
                            <a href="/login" class="btn btn-secondary me-2">Se connecter</a>
                            <a href="/register" class="btn btn-secondary me-2">S'enregister</a>
                        <?php } else { ?>
                            <a href="/user" class="btn btn-secondary me-2">Votre compte</a>
                            <a href="/addMovie" class="btn btn-secondary me-2">Ajouter un film</a>
                            <a href="/logout" class="btn btn-secondary me-2">Se déconnecter</a>
                        <?php } ?>
                    </div>
                </div>
        </nav>
    </header>

    <main>
        <?php /** Content defined in views */ ?>
        <?= $content ?? "<h1>bad dev forgot to add content</h1>" ?>

    </main>
    <footer>

        <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

    </footer>
    </body>

    </html>
    <?php
}
