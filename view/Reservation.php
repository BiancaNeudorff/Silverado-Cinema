<?php
$model = new MovieModel();
$movie = $model->getMovieByType($reservation->movie);
?>
<form action='action/updateBooking.php?id=<?php echo $reservation->id; ?>' method='post'>
  <input type='hidden' name='movie' value='<?php Print $reservation->movie; ?>' />
  <input type='hidden' name='day' value='<?php Print $reservation->day; ?>' />
  <input type='hidden' name='time' value='<?php Print $reservation->time; ?>' />
<div class='row'>
  <div class='col col-2'>
    <img src='<?php Print $movie->poster; ?>' width='100%' />
  </div>
  <div class='col col-3'>
    <h2><?php echo $movie->title; ?></h2>
    <b>Day: </b><?php echo $reservation->day; ?>
    <br>
    <b>Time: </b><?php echo $reservation->time; ?>
    <br><br>
    <?php echo $movie->summary; ?>
    <br><br><br>
    <input class="input-submit" type="submit" value="Update Quantities" >
    <br><br>
    <a href="javascript:void(0)" class="bookbtn">Remove from cart</a>
    <br><br>
    <h1>$<?php echo $cart->calculateReservationTotal($reservation); ?></h1>
  </div>
  <div class='col col-1'></div>
  <div class='col col-3'>
      - Standard Adult
      <br><br>
      <input class='input-field' type='number' name='SA' min='0' value='<?php echo $reservation->SA; ?>' />
      <br><br>
      - Standard Concession
      <br><br>
      <input class='input-field' type='number' name='SP' min='0' value='<?php echo $reservation->SP; ?>' />
      <br><br>
      - Standard Child
      <br><br>
      <input class='input-field' type='number' name='SC' min='0' value='<?php echo $reservation->SC; ?>' />
      <br><br>
      - First Class Adult
      <br><br>
      <input class='input-field' type='number' name='FA' min='0' value='<?php echo $reservation->FA; ?>' />
  </div>
  <div class='col col-3'>
    - First Class Child
    <br><br>
    <input class='input-field' type='number' name='FC' min='0' value='<?php echo $reservation->FC; ?>' />
    <br><br>
    - Beanbag, one lonely person
    <br><br>
    <input class='input-field' type='number' name='B1' min='0' value='<?php echo $reservation->B1; ?>' />
    <br><br>
    - Beanbag, up to two people
    <br><br>
    <input class='input-field' type='number' name='B2' min='0' value='<?php echo $reservation->B2; ?>' />
    <br><br>
    - Beanbag, up to three children
    <br><br>
    <input class='input-field' type='number' name='B3' min='0' value='<?php echo $reservation->B3; ?>' />
  </div>
</div>
</form>
<br><br><br><br>
<hr style='background:#000'>
<br><br>
