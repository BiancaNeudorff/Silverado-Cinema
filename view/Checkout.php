<h1>Cart</h1>
<hr style='background:#000'>
<br><br>
<b>Total Purchase Amount: </b><br>
<h1>$<?php echo $cart->calculateCartGrandTotal(); ?></h1>
<br><br>
<b>Customer Details: </b>
<br><br>
<form action="action/checkout.php" method="post">
  <div class='row booking'>
    <div class='col col-1'>Name: </div>
    <div class='col col-3'>
      <input type='text' class='input-field' name='name' required />
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-1'>Email: </div>
    <div class='col col-3'>
      <input type='email' class='input-field' name='email' required />
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-1'>Phone (0312345678): </div>
    <div class='col col-3'>
      <input type='text' pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" class='input-field' name='phone' required />
    </div>
  </div>
  <br>
  <input class='input-submit' type='submit' value='Checkout' />
</form>
