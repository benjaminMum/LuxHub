<?php

function reservationView($bookings)
{
    $title = "Réservation";
    $currentNav = "myBookings";

    // Content
    ob_start();
?>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Mes réservations</h1>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php $i = 0 ?>
                    <?php while ($i < count($bookings)) { ?>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $bookings[$i]['title'] ?>
                                        <hr>
                                    </h5>
                                    <p class="card-text">Date: <?= $bookings[$i]['date'] ?></p>
                                    <p class="card-text">Heure: <?= $bookings[$i]['starting_hour'] ?></p>
                                    <p class="card-text">Salle: <?= $bookings[$i]['name'] ?></p>
                                    <p class="card-text">Place: <?= $bookings[$i]['Name'] ?></p>
                                    <div class="d-flex justify-content-end">
                                        <a href="/session/<?= $bookings[$i]['session_code'] ?>" class="btn btn-primary">Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    } ?>
                </div>
            </div>
        </div>

    </main>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
