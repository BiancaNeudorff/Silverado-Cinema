<h1>Cart</h1>
<hr style='background:#000'>
<br><br>
<?php
$controller = new Controller();
$reservations = $cart->getReservations();
for ($i = 0; $i < count($reservations); $i++){
  $controller->renderModule("reservation",$i);
}
if (count($reservations) == 0){
  echo "Cart is empty";
} else {
?>
<div class='row'>
  <div class='col col-1'></div>
  <div class='col col-10'>
    <form action='action/applyVoucher.php' method="post" onsubmit="return checkVoucher()">
      <b style='display:none' id='voucherError'>Error: Invalid voucher format<br><br></b>
      <?php
        if ($cart->getVoucher() != "" && $cart->getVoucherDiscount() == 0){
          Print "<b>Error: Invalid voucher<br><br></b>";
        }
      ?>
      <b id='voucherError' style='display:none'>Error: Invalid voucher format<br><br></b>
      <b>Voucher:</b> <input class='input-field' id='voucher' name='voucher' /><input class='input-submit' type='submit' value='Apply' />
    </form>
    <br><br>
    <?php
      $discount = $cart->getVoucherDiscount();
      if ($cart->getVoucherDiscount() < 0){
        ?>
        <b>Total </b>
        <h2><?php Print $cart->calculateCartTotal(); ?></h2>
        <br>
        <?php
        echo "<b>Voucher (" . $cart->getVoucher() . ") </b> <h2>" . $cart->getVoucherDiscount() . "</h2>";
      }
    ?>
    <br>
    <b>Grand total</b>
    <br>
    <h1>$<?php Print $cart->calculateCartGrandTotal(); ?></h1>
    <br><br>
    <a href="action/clearCart.php" class="bookbtn">Empty Cart</a><a href="checkout.php" class="bookbtn">Checkout</a>
  </div>
</div>
<?php
}
?>
<script>
  function checkVoucher(){
    $("#voucherError").fadeOut();
    var match = /[0-9][0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9][0-9]-[A-Z][A-Z]/.test($("#voucher").val());

    if (match == false){
      $("#voucherError").fadeIn();
      return false;
    } else {
      return true;
    }
  }
</script>
