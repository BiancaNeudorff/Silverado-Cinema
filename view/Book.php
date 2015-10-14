<?php
  Print "<script>var times = " . json_encode($movie->screenings) . ";</script>";
?>
<h1>Book Movie</h1>
<br>
<hr style='background:#000'>
<br>
<img src='<?php echo $movie->poster ?>' />
<h2><?php echo $movie->title ?></h2>
<p><?php echo $movie->summary ?></p>
<img src='<?php echo $movie->rating ?>' width='100px'/>
<br><br>
<hr style='background:#000'>
<br><br>
<form action="action/book.php" method="post" onsubmit="return checkForm()">
  <input type='hidden' class='input-field' name='movie' value='<?php Print $category;?>' />
  <input type='hidden' class='input-field' name='price' value='0.00' />
  <b>Day: </b>
  <select name='day' id='day' onchange='calculatePrice()'>
    <?php
      $count = 0;
      foreach ($movie->screenings as $key => $value) {
         $days[$count] = $key;
         $count++;
         Print "<option value='" . $key . "'>" . $key . "</option>";
      }

    ?>
  </select>
  <br><br>
  <b>Time: </b><input class='input-field' type='text' name='time' id='time' readonly/>
  <br><br>
  <h3>Seat Quantities</h3>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Standard Adult: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='SA' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-SA'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Standard Concession: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='SP' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-SP'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Standard Child: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='SC' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-SC'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>First Class Adult: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='FA' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-FA'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>First Class Child: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='FC' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-FC'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Beanbag, one lonely person: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='B1' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-B1'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Beanbag, up to two people: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='B2' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-B2'>0.00</span>
    </div>
  </div>
  <div class='row booking'>
    <div class='col col-5'>
      <div class='row booking'>
        <div class='col col-6'>
          <b>Beanbag, up to three children: </b>
        </div>
        <div class='col col-6'>
          <input class='input-field' type='number' name='B3' min='0' value='0' onchange='calculatePrice()'/>
        </div>
      </div>
    </div>
    <div class='col col-3'>
      $<span class='total-B3'>0.00</span>
    </div>
  </div>
  <br>
  <div class='error' style='display:none'>

  </div>
  <br>
  <h3>Total: $<span id='total'>0.00</span></h3>
  <br><br>
  <input class='input-submit' type='submit' value='Add to cart' />
</form>
<script>
  $("#time").val(times["<?php Print $days[0];?>"]);
  $("#day").change(function() {
    $("#time").val(times[$("#day").val()]);
  });

  function checkForm(){
    $(".error").hide();
    var totalNumTickets = parseInt($("input[name=SA]").val())
                          + parseInt($("input[name=SP]").val())
                          + parseInt($("input[name=SC]").val())
                          + parseInt($("input[name=FA]").val())
                          + parseInt($("input[name=FC]").val())
                          + parseInt($("input[name=B1]").val())
                          + parseInt($("input[name=B2]").val())
                          + parseInt($("input[name=B3]").val());

    if (totalNumTickets <= 0){
      $(".error").html("Please book at least one ticket");
      $(".error").show();
      return false;
    }
    return true;
  }

  function calculatePrice(){
    var day = $("#day").val();
    var time = $("#time").val();
    //Calculate SA
    var SA = 0.00;
    var SP = 0.00;
    var SC = 0.00;
    var FA = 0.00;
    var FC = 0.00;
    var B1 = 0.00;
    var B2 = 0.00;
    var B3 = 0.00;

    if (day == "Monday" || day == "Tuesday"){
      SA = parseInt($("input[name=SA]").val()) * 12.00;
      SP = parseInt($("input[name=SP]").val()) * 10.00;
      SC = parseInt($("input[name=SC]").val()) * 8.00;
      FA = parseInt($("input[name=FA]").val()) * 25.00;
      FC = parseInt($("input[name=FC]").val()) * 20.00;
      B1 = parseInt($("input[name=B1]").val()) * 20.00;
      B2 = parseInt($("input[name=B2]").val()) * 20.00;
      B3 = parseInt($("input[name=B3]").val()) * 20.00;
    }

    if (time == "1pm"){
      if (day == "Wednesday" || day == "Thursday" || day == "Friday"){
        SA = parseInt($("input[name=SA]").val()) * 12.00;
        SP = parseInt($("input[name=SP]").val()) * 10.00;
        SC = parseInt($("input[name=SC]").val()) * 8.00;
        FA = parseInt($("input[name=FA]").val()) * 25.00;
        FC = parseInt($("input[name=FC]").val()) * 20.00;
        B1 = parseInt($("input[name=B1]").val()) * 20.00;
        B2 = parseInt($("input[name=B2]").val()) * 20.00;
        B3 = parseInt($("input[name=B3]").val()) * 20.00;
      }
    } else {
      if (day == "Wednesday" || day == "Thursday" || day == "Friday"){
        SA = parseInt($("input[name=SA]").val()) * 18.00;
        SP = parseInt($("input[name=SP]").val()) * 15.00;
        SC = parseInt($("input[name=SC]").val()) * 12.00;
        FA = parseInt($("input[name=FA]").val()) * 30.00;
        FC = parseInt($("input[name=FC]").val()) * 25.00;
        B1 = parseInt($("input[name=B1]").val()) * 30.00;
        B2 = parseInt($("input[name=B2]").val()) * 30.00;
        B3 = parseInt($("input[name=B3]").val()) * 30.00;
      }
    }

    if (day == "Saturday" || day == "Sunday"){
      SA = parseInt($("input[name=SA]").val()) * 18.00;
      SP = parseInt($("input[name=SP]").val()) * 15.00;
      SC = parseInt($("input[name=SC]").val()) * 12.00;
      FA = parseInt($("input[name=FA]").val()) * 30.00;
      FC = parseInt($("input[name=FC]").val()) * 25.00;
      B1 = parseInt($("input[name=B1]").val()) * 30.00;
      B2 = parseInt($("input[name=B2]").val()) * 30.00;
      B3 = parseInt($("input[name=B3]").val()) * 30.00;
    }

    //Display subtotals
    $(".total-SA").html(SA.toFixed(2));
    $(".total-SP").html(SP.toFixed(2));
    $(".total-SC").html(SC.toFixed(2));
    $(".total-FA").html(FA.toFixed(2));
    $(".total-FC").html(FC.toFixed(2));
    $(".total-B1").html(B1.toFixed(2));
    $(".total-B2").html(B2.toFixed(2));
    $(".total-B3").html(B3.toFixed(2));

    //Calculate grand total
    var total = SA + SP + SC + FA + FC + B1 + B2 + B3;

    $("#total").html(total.toFixed(2));
    $("input[name=price]").val(total.toFixed(2));

  }
</script>
