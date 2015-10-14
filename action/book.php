<?php
require("../controller/Controller.php");
$controller = new Controller();
$cart = new CartModel();
$cart->createReservation((object)$_POST);
$controller->redirect("../cart.php");
?>
