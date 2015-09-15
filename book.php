<?php
  include "header.php";
  $movie = $_GET["movie"];
  $moviename = "";
  $moviecat = "";

  if ($movie == "aloha"){
    $moviename = "Aloha";
    $moviecat = "RC";
  }

  if ($movie == "insideout"){
    $moviename = "Inside Out";
    $moviecat = "CH";
  }

  if ($movie == "awalkinthewoods"){
    $moviename = "A Walk in the Woods";
    $moviecat = "AF";
  }

  if ($movie == "awalkinthewoods"){
    $moviename = "A Walk in the Woods";
    $moviecat = "AF";
  }

  if ($movie == "noescape"){
    $moviename = "No Escape";
    $moviecat = "AC";
  }

?>
<h1>Book Movie</h1>
<h3><?php Print $moviename; ?></h3>

<?php
  include "footer.php";
?>
