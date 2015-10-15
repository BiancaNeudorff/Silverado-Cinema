<?php
require("../controller/Controller.php");
$controller = new Controller();
$checkout = new CheckoutModel();
$checkout->setCustomerDetails((object)$_POST);
$checkout->generateTicket();
$controller->redirect("../ticket.php");
?>
