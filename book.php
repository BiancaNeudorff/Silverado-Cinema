<?php
  error_reporting(E_ALL);
  require("controller/Controller.php");
  $controller = new Controller();
  $controller->render("book", (object)array(
    "type" => $_GET['movie']
  ));
?>
