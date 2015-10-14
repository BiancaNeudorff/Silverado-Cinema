<?php
require("../controller/Controller.php");
$controller = new Controller();
$cart = new CartModel();
$cart->applyVoucher($_POST['voucher']);
$controller->redirect("../cart.php");
?>
