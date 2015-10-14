<?php
require("../controller/Controller.php");
$controller = new Controller();
$cart = new CartModel();
$cart->updateReservation($_GET['id'],(object)$_POST);
$controller->redirect("../cart.php");
?>
