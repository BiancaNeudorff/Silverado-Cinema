<?php
require("../controller/Controller.php");
$controller = new Controller();
$cart = new CartModel();
$cart->clearReservation($_GET['id']);
$controller->redirect("../cart.php");
?>
