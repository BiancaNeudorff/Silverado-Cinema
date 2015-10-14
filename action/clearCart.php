<?php
require("../controller/Controller.php");
$controller = new Controller();
$cart = new CartModel();
$cart->clear();
$controller->redirect("../cart.php");
?>
