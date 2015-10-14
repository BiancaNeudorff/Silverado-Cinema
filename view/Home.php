<div class='row centre'>
  <!-- Original images below sourced for educational purposes: http://www.flickr.com (creative commons)-->
  <div class='col col-3 centre imgholder' style='background-image:url("<?php echo $info->images[0]; ?>")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("<?php echo $info->images[1]; ?>")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("<?php echo $info->images[2]; ?>")'></div>
  <div class='col col-3 centre imgholder' style='background-image:url("<?php echo $info->images[3]; ?>")'></div>
</div>
<h1 class='title centre'><?php echo $info->tagline; ?></h1>
<div class='centre'>
  <p>
    <?php echo $info->content; ?>
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
      <h3>Grand reopening - <?php echo $info->reopenDate; ?></h3>
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
    var openTime = <?php echo $info->reopenTimestamp; ?>;
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
