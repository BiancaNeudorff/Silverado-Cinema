<h1>Tickets</h1>
<hr style='background:#000'>
<br><br>
<?php
  $reservations = $cart->getReservations();
  for ($i = 0; $i < count($reservations); $i++){
    ?>
    <div class='ticket'>
      <div class='row'>
        <div class='col col-6'>
        <img src='http://barney.slidemath.com.au:6923/images/film-reel.png' width='40px' style='margin-left:10px;' />
        <br>
        <h1>Silverado Cinema</h1>
        <b>Booking code: </b> <?php echo $ticket->id; ?>
        <br>
        <?php
        echo $cart->printReservation($i);
        ?>
        </div>
        <div class='col col-6'>
          <img src='<?php echo $ticket->qrCode; ?>' class='qrcode' width='100px'/>
        </div>
      </div>
    </div>
    <?php
  }
?>
