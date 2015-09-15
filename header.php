<!DOCTYPE html>
<html>
  <head>
    <title>Silverado Cinema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js'></script>
    <script src='scripts/utils.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div id='container'>
      <div id='header-image'></div>
      <div id='header' class='row'>
          <div class='col col-1'></div>
          <div id='logo' class='col col-4'>
            <!-- Original image below sourced for educational purposes: http://ic8.link/1427 -->
            <img id='logo-img' src='images/film-reel.png' height='40' alt='Silverado Cinema Logo'/>
            <span>Silverado Cinema</span>
          </div>
          <div class='col col-1'></div>
          <div id='menu' class='col col-6'>
              <a href='index.php'>HOME</a>
              <a href='cinema.php'>CINEMA</a>
              <a href='movies.php'>MOVIES</a>
              <a href='#' onclick='loadPage("contact")'>CONTACT</a>
          </div>
          <div class='col col-1'></div>
      </div>
      <div id='content-holder'>
          <div id='content' >
