<?php

function showBooking($seats, $data)
{

    $title = "Réserver";
    $currentNav = "Booking";
    ob_start();
?>
    <style>
        .seat {
            border-style: outset;
            margin: 0.1em;
            background-color: #464;
            color: #030;
            width: 4vw;
            height: 8vh;
        }

        .selected {
            border-style: inset;
            background-color: #0A0;
            color: #0F0;
        }

        .reserved {
            border-style: outset;
            background-color: gray;
            color: darkred;
        }
    </style>
    <?php
    $head = ob_get_clean();

    ob_start();
    ?>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Réserver</h1>
                </div>
            </div>
        </section>
        <pre><?=
                print_r($data);
                ?>
                        </pre>

        <div class="align-content-center">
            <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
                <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center">
                    <form action="/register" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="bookingFilm">Film</label>
                                <input type="texte" name="bookingFilm" id="bookingFilm" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="bookingLanguage">Langue</label><br>
                                <select name="bookingLanguage" id="bookingLanguage">
                                    <option value="vf">vf</option>
                                    <option value="vo">vo</option>
                                    <option value="vostfr">vostfr</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="bookingDate">Date</label>
                                <input type="text" name="bookingDate" id="bookingDate" required>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label for="bookingHour">Heure</label><br>
                                <input type="text" name="bookingHour" id="bookingHour" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewLastName">Salle</label><br>
                                <input type="text" name="registerLastname" id="inputNewLastName" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputNewBirthDate">Siège(s) seléctionné(s)</label><br>
                                <input name="seats" id="seats">
                            </div>
                        </div>

                        <br>
                        <div>
                            <?php
                            $letter = 'A';
                            for ($i = 1; $i <= $seats[0]['line']; $i++) {
                                for ($l = 1; $l <= $seats[0]['columns']; $l++) {
                                    foreach ($data as $seat){
                                        if ($seat['Name'] = "$letter . $l"){
                                            $yes = true;                                          
                                        }
                                    }
                            ?>
                                    <input type="button" id="<?=$letter . $l?>" class="seat" value="<?= $letter . $l ?>">
                                <?php
                                }
                                $letter++;
                                ?>
                                <br>
                            <?php
                            } ?>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                                <input type="reset" value="Effacer">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="submit" value="S'inscrire">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </main>

    <?php

    $content = ob_get_clean();

    ob_start();
    ?>

    <script type="module" src="view/js/bookingSeats.js"></script>

<?php
    $scripts = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav, $head, $scripts);
}
