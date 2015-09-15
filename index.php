<?php
  require ("header.php");
?>
<div class='row centre'>
  <div class='col col-3 centre imgholder' style='background-image:url("https://farm2.staticflickr.com/1299/4687826636_f08e0f9fb6.jpg")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("https://farm8.staticflickr.com/7370/9412590876_896113666b_k.jpg")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("https://farm3.staticflickr.com/2404/2349758304_a0a6c155b3_b.jpg")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("https://farm8.staticflickr.com/7199/6858584861_ed1300ccef_b.jpg")'></div>
</div>
<h1 class='title centre'>Cinema Reimagined</h1>
<div class='centre'>
  <p>
    <b>Welcome to the new Silverado cinema.</b>
    <br><br>
    We have spent a lot of time thinking about how we can perfect the cinema experience and bring it to you.
    <br><br>
    We have renovated the entire complex with new seats, 3D projection, a Dolby Sound system and that is just the start.
    <br><br>
    There is lots of suprises in store for the entire family, so bring them along and come and see us on our grand reopening. Prepare
    to be amazed and rediscover the cinema experience.
    </p>
    <br><br>
    <div class='counter' id='counter1'>0</div>
    <div class='counter' id='counter2'>0</div>
    <div class='counter'>:</div>
    <div class='counter' id='counter3'>0</div>
    <div class='counter' id='counter4'>0</div>
    <div class='counter'>:</div>
    <div class='counter' id='counter5'>0</div>
    <div class='counter' id='counter6'>0</div>
    <br><br>
    <p>
      <h3>Grand reopening - Saturday 26th September 8PM</h3>
    </p>
</div>
<script>
  setTimeout(function(){
    $(".imgholder").addClass("colorimg");
  }, 2000);
  $( document ).ready(function() {

    setTimeout(function(){
      animateCounter();
    }, 60000);
    animateCounter();

  });

  function animateCounter(){
    //Animate the countdown to open counter
    var openTime = 1443261600000;
    var currentTime = new Date().getTime();
    var timeLeft = openTime - currentTime;
    if (timeLeft < 0){
      timeLeft = 0;
    }
    //Calculate days, hours and minutes
    var days = Math.floor(timeLeft / 86400000);
    timeLeft = timeLeft - (days * 86400000);
    var hours = Math.floor(timeLeft / 3600000);
    timeLeft = timeLeft - (hours * 3600000);
    var minutes = Math.floor(timeLeft / 60000);
    timeLeft = timeLeft - (minutes * 60000);
    if (days.toString().length == 1){
      days = "0" + days.toString();
    }
    if (hours.toString().length == 1){
      hours = "0" + hours.toString();
    }
    if (minutes.toString().length == 1){
      minutes = "0" + minutes.toString();
    }
    console.log({days: days, hours: hours, minutes: minutes});
    var count = parseInt(days.toString() + hours.toString() + minutes.toString());
    MHCounterSpin("counter",6,count,20,500);
  }
</script>
<?php
  require ("footer.php");
?>
