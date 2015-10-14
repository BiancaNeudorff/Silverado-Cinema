<?php

class MovieModel {
  public function __construct() {
    return $this;
  }

  public function getMovies() {
    //$json = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . "/~e54061/wp/moviesJSON.php");
    $json = file_get_contents('http://' . "titan.csit.rmit.edu.au" . "/~e54061/wp/moviesJSON.php");
    $movies = json_decode($json);
    return $movies;
  }

  public function getMovieByType($type){
    //$json = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . "/~e54061/wp/moviesJSON.php");
    $json = file_get_contents('http://' . "titan.csit.rmit.edu.au" . "/~e54061/wp/moviesJSON.php");
    $movies = json_decode($json);
    return $movies->$type;
  }

  public function getMovieCategories(){
    return array("CH","AF", "RC", "AC");
  }

}

?>
