<?php

class CheckoutModel {
  public function __construct() {
    return $this;
  }

  public function setCustomerDetails($details){
    $_SESSION['customer'] = $details;
  }

  public function getCustomer(){
    return $_SESSION['customer'];
  }

  public function generateTicket(){
    $ticketID = $this->generateRandomString(5);
    $qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . $ticketID;
    $_SESSION['ticket'] = (object)array("id"=> $ticketID, "qrCode" => $qrCode);
  }

  public function getTicket(){
    return $_SESSION['ticket'];
  }

  public function checkout(){
    $ticket = $this->getTicket();
    $cart = new CartModel();
    $checkout = new CheckoutModel();
    $filename = "purchases/" . $ticket->id . ".json";
    $voucher = $cart->getVoucher();
    if ($cart->getVoucherDiscount() == 0){
      $voucher = "";
    }
    $data = (object)array("ticket"=>$ticket, "reservation"=>$cart->getReservations(), "customer"=>$this->getCustomer(), "total"=>$cart->calculateCartGrandTotal(), "voucher"=> $voucher);
    file_put_contents($filename, json_encode($data));
    $cart->clear();
  }

  //Random string function sourced for educational purposes - Stephen Watkins (http://stackoverflow.com/questions/4356289/php-random-string-generator)
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }


}

?>
