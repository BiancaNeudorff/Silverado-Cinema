<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $info->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js'></script>
    <script src='scripts/utils.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href="style.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div id='container'>
      <div id='header-image'></div>
      <div id='header' class='row'>
            <a href="https://github.com/matthaywardwebdesign/SilveradoCinema"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
          <div class='col col-1'></div>
          <div id='logo' class='col col-4'>
            <!-- Original image below sourced for educational purposes: http://ic8.link/1427 -->
            <img id='logo-img' src='<?php echo $info->logo; ?>' height='40' alt='<?php echo $info->logoAlt; ?>'/>
            <span><?php echo $info->title; ?></span>
          </div>
          <div class='col col-1'></div>
          <div id='menu' class='col col-6'>
              <?php
                for ($i = 0; $i < count($menu); $i++){
                  echo "<a href='" . $menu[$i]->url . "'>" . $menu[$i]->name . "</a>";
                }
              ?>
          </div>
          <div class='col col-1'></div>
      </div>
      <div id='content-holder'>
          <div id='content' >
