<?php
  error_reporting(E_ALL);
  require("controller/Controller.php");
  $controller = new Controller();
  $checkout = new CheckoutModel();
  $controller->render("ticket");
  $checkout->checkout();
?>
