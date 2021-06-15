<?php

function addMovieView($err = null)
{
    $title = "Ajouter un film";
    $currentNav = "addMovie";
    // Content
    ob_start();

?>

    <div class="container">
        <br>
        <div class="text-center">
            <h4>Ajouter un film</h4>
        </div>
        <br>
        <div>
            <?php if (@isset($err)) : ?>
                <p class="alert alert-danger"><?= $err ?></p>
            <?php endif; ?>
        </div>
        <div class="align-content-center">
            <div class="col-lg-12  div-wrapper d-flex justify-content-center ">
                <div class="col-lg-6 d-flex justify-content-center border pt-3 pb-3 align-content-center">
                    <form action="/addMovie" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieID">l'EIDR du film</label>
                                <input type="texte" name="movieID" id="inputMovieID" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieDuration">Durée(minutes)</label><br>
                                <input type="number" name="movieDuration" id="inputMovieDuration" required min="0" oninput="validity.valid||(value='');">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieTitle">Titre</label><br>
                                <input type="text" name="movieTitle" id="inputMovieTitle" required>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieLegalAge">Âge légal</label><br>
                                <input type="number" name="movieLegalAge" id="inputMovieLegalAge" required min="0" oninput="validity.valid||(value='');">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieDescription">Description</label><br>
                                <textarea name="movieDescription" id="inputMovieDescription" rows="5" cols="23" required></textarea>
                                </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputReleaseDate">Date de sortie</label>
                                <input type="date" name="movieReleaseDate" id="inputReleaseDate" required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg6 col-sm-6">
                                <label for="inputMovieTrailer">Bande annonce(URL youtube)</label><br>
                                <input type="text" name="movieTrailer" id="inputMovieTrailer" required>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label for="inputMovieThumbnail">Image de miniature</label><br>
                                <input type="file" name="movieThumbnail" id="inputMovieThumbnail" required accept="image/png, image/jpeg">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 text-end pe-5 ">
                                <input type="reset" value="Effacer">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="submit" value="Ajouter">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

    $content = ob_get_clean();

    require_once "view/template.php";

    renderTemplate($title, $content, $currentNav);
}
