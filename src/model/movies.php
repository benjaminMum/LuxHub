<?php

/**
 * @file movies.php
 * @author Created by Benjamin.Fontana@cpnv.ch
 * @version 0.1
 * @date 17.0.2021
 */
require_once "model/dbConnector.php";

 function getAllMovies ()
 {
    $sql = "SELECT * FROM movies";
    $res = executeQuerySelect($sql);
    return $res;
 }

 function getAMovie($movieID)
 {
   $sql = "SELECT * FROM movies WHERE movie_code = $movieID";
   $res = executeQuerySelect($sql);
   return $res;
 }

function writeAMovie($movieData)
{
  $id = $movieData['movieID'];
  $title = $movieData['movieTitle'];
  $releaseDate = $movieData['movieReleaseDate'];
  $duration = $movieData['movieDuration'];
  $description = $movieData['movieDescription'];
  $legalAge = $movieData['movieLegalAge'];
  $thumbnail = "view/content/img/thumbnail/" . $movieData['movieID'] . ".jpg";
  $trailer = $movieData['movieTrailer'];

  $sql = "INSERT INTO movies (movie_code, title, release_date, duration, description, legal_age, thumbnails, trailers)  VALUES ('$id', '$title', '$releaseDate', $duration, '$description', $legalAge, '$thumbnail', '$trailer')";

  $res = executeQueryIUD($sql);
  return $res;
}

function isMovieAlreadyExist($movieID) {
  $sql = "SELECT * FROM movies WHERE movie_code LIKE '$movieID'";

  $res = executeQuerySelect($sql);
  return $res;

}