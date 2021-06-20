<?php

function getUsersView($usersData, $types)
{
    $title = "Gérer les utilisateurs";
    $currentNav = "manage-users";

    // Content
    ob_start();

    ?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Utilisateurs</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="container">
                <form method="GET" action="/showUsers">
                    <div>
                        <label for="txtSearch">Recherche</label>
                        <input id="txtSearch" name="search" type="text">

                        <input type="submit" class="btn-primary" value="Chercher">
                    </div>


                </form>
            </div>

            <div class="container">
                <div class="row border m-2 ">

                    <table>
                        <tr class="border-3">
                            <th>E-mail</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Type</th>
                        </tr>
                        <?php foreach ($usersData as $user) { ?>
                            <tr class="border-1">
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['lastname'] ?></td>
                                <td><?= $user['firstname'] ?></td>
                                <td><?= $user['birthdate'] ?></td>
                                <form method="POST" action="/modifyUserType?userId=<?= $user[2] ?>">
                                    <td>
                                        <select name="userType">
                                            <?php foreach ($types as $type) { ?>
                                                <option value="<?= $type['id'] ?>" <?php if ($type['id'] == $user[8]) { ?> selected <?php } ?>><?= $type['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="col-2">
                                            <input id="btnSubmit" type="submit" class="btn-primary" value="Modifier">
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>

                    </table>

                </div>

            </div>

        </div>
    </div>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";
    renderTemplate($title, $content, $currentNav);
}
