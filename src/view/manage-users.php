<?php

function getUsersView($usersData, $types)
{
    $title = "Gérer les utilisateurs";
    $currentNav = "manage-users";

    // Content
    ob_start();

    ?>

    <h1 class="text-center mb-5 ">Utilisateurs</h1>

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
                        <td>
                            <select id="dbxType">
                                <?php foreach ($types as $type) { ?>
                                    <option value="<?= $type['id'] ?>" <?php if ($type['id'] == $user[8]) { ?> selected <?php } ?>><?= $type['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="col-2">
                                <button class="btn-primary" id="btnChangeType">Confirmer</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </table>

        </div>

    </div>

    <?php

    $content = ob_get_clean();

    require_once "view/template.php";
    renderTemplate($title, $content, $currentNav);
}
