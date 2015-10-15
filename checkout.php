<?php
  error_reporting(E_ALL);
  require("controller/Controller.php");
  $controller = new Controller();

  $cart = new CartModel();
  if ($cart->isEmpty()){
    $controller->redirect("cart.php");
  } else {
    $controller->render("checkout");
  }

?>
