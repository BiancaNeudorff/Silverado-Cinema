<?php

class CartModel {
  public function __construct() {
    return $this;
  }

  public function getReservations() {
    if (isset($_SESSION['reservations'])){
        return $_SESSION['reservations'];
    } else {
      return array();
    }
  }

  public function createReservation($opts) {
    $reservations = $this->getReservations();
    array_push($reservations, $opts);
    $_SESSION['reservations'] = $reservations;
  }

  public function updateReservation($id, $opts){
    $reservations = $this->getReservations();
    $reservations[$id] = $opts;
    $_SESSION['reservations'] = $reservations;
  }

  public function getReservation($id){
    return $this->getReservations()[$id];
  }

  public function clear(){
    $_SESSION['reservations'] = array();
  }

  public function calculateCartTotal(){
    $total = 0;
    $reservations = $this->getReservations();
    for ($i = 0; $i < count($reservations); $i++){
      $total+=$this->calculateReservationTotal($reservations[$i]);
    }
    return money_format("%.2n",$total);
  }

  public function calculateCartGrandTotal(){
    return money_format("%.2n",$this->calculateCartTotal() + $this->getVoucherDiscount());
  }

  public function applyVoucher($voucher){
    $_SESSION['voucher'] = $voucher;
  }

  public function getVoucherDiscount(){
    $voucher = $this->getVoucher();
    $n1 = substr($voucher, 0, 1);
    $n2 = substr($voucher, 1, 1);
    $n3 = substr($voucher, 2, 1);
    $n4 = substr($voucher, 3, 1);
    $n5 = substr($voucher, 4, 1);
    $n6 = substr($voucher, 6, 1);
    $n7 = substr($voucher, 7, 1);
    $n8 = substr($voucher, 8, 1);
    $n9 = substr($voucher, 9, 1);
    $n10 = substr($voucher, 10, 1);
    $l1 = substr($voucher, 12, 1);
    $l2 = substr($voucher, 13, 1);
    $chkA = (($n1 * $n2 + $n3) * $n4 + $n5) % 26;
    $chkB = (($n6 * $n7 + $n8) * $n9 + $n10) % 26;
    $lookup = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    if ($lookup[$chkA] == $l1 && $lookup[$chkB] == $l2){
      return money_format("%.2n",$this->calculateCartTotal() * -0.20);
    } else {
      return 0;
    }
  }

  public function getVoucher(){
    if (isset($_SESSION['voucher'])){
        return $_SESSION['voucher'];
    } else {
      return "";
    }
  }

  public function calculateReservationTotal($reservation){
    $day = $reservation->day;
    $time = $reservation->time;
    //Calculate SA
    $SA = 0.00;
    $SP = 0.00;
    $SC = 0.00;
    $FA = 0.00;
    $FC = 0.00;
    $B1 = 0.00;
    $B2 = 0.00;
    $B3 = 0.00;

    if ($day == "Monday" || $day == "Tuesday"){
      $SA = $reservation->SA * 12.00;
      $SP = $reservation->SP * 10.00;
      $SC = $reservation->SC * 8.00;
      $FA = $reservation->FA * 25.00;
      $FC = $reservation->FC * 20.00;
      $B1 = $reservation->B1 * 20.00;
      $B2 = $reservation->B2 * 20.00;
      $B3 = $reservation->B3 * 20.00;
    }

    if ($time == "1pm"){
      if ($day == "Wednesday" || $day == "Thursday" || $day == "Friday"){
        $SA = $reservation->SA * 12.00;
        $SP = $reservation->SP * 10.00;
        $SC = $reservation->SC * 8.00;
        $FA = $reservation->FA * 25.00;
        $FC = $reservation->FC * 20.00;
        $B1 = $reservation->B1 * 20.00;
        $B2 = $reservation->B2 * 20.00;
        $B3 = $reservation->B3 * 20.00;
      }
    } else {
      if ($day == "Wednesday" || $day == "Thursday" || $day == "Friday"){
        $SA = $reservation->SA * 18.00;
        $SP = $reservation->SP * 15.00;
        $SC = $reservation->SC * 12.00;
        $FA = $reservation->FA * 30.00;
        $FC = $reservation->FC * 25.00;
        $B1 = $reservation->B1 * 30.00;
        $B2 = $reservation->B2 * 30.00;
        $B3 = $reservation->B3 * 30.00;
      }
    }

    if ($day == "Saturday" || $day == "Sunday"){
      $SA = $reservation->SA * 18.00;
      $SP = $reservation->SP * 15.00;
      $SC = $reservation->SC * 12.00;
      $FA = $reservation->FA * 30.00;
      $FC = $reservation->FC * 25.00;
      $B1 = $reservation->B1 * 30.00;
      $B2 = $reservation->B2 * 30.00;
      $B3 = $reservation->B3 * 30.00;
    }

    return money_format("%.2n",$SA + $SP + $SC + $FA + $FC + $B1 + $B2 + $B3);
  }

}

?>
