<?php
  include "header.php";
  $movie = $_GET["movie"];
  $moviename = "";
  $moviecat = "";

  if ($movie == "aloha"){
    $moviename = "Aloha";
    $moviecat = "RC";
  }

  if ($movie == "insideout"){
    $moviename = "Inside Out";
    $moviecat = "CH";
  }

  if ($movie == "awalkinthewoods"){
    $moviename = "A Walk in the Woods";
    $moviecat = "AF";
  }

  if ($movie == "noescape"){
    $moviename = "No Escape";
    $moviecat = "AC";
  }

  $days = [];
  if ($moviecat == "AC"){
    $days = ["Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    Print "<script>var times = {'Wednesday':'9pm','Thursday':'9pm','Friday':'9pm','Saturday':'9pm','Sunday':'9pm'};</script>";
  }

  if ($moviecat == "AF"){
    $days = ["Monday", "Tuesday", "Saturday", "Sunday"];
    //$times = {"Monday":"6pm","Tuesday":"6pm","Saturday":"3pm","Sunday":"3pm"};
  }

  if ($moviecat == "CH"){
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    //$times = {"Monday":"9pm","Tuesday":"9pm","Wednesday":"1pm","Thursday":"1pm","Friday":"1pm","Saturday":"6pm","Sunday":"6pm"};
  }


  if ($moviecat == "CH"){
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    //$times = {"Monday":"1pm","Tuesday":"1pm","Wednesday":"6pm","Thursday":"6pm","Friday":"6pm","Saturday":"12pm","Sunday":"12pm"};
  }

?>
<h1>Book Movie</h1>
<h3><?php Print $moviename; ?></h3>
<br><br>
<form action="http://titan.csit.rmit.edu.au/~e54061/wp/testbooking.php" method="post">
  <input type='hidden' class='input-field' name='movie' value='<?php Print $moviecat;?>' />
  <b>Day:</b>
  <select name='day'>
    <?php
      for ($i = 0; $i < count($days); $i++){
        Print "<option value='" + $days[$i] + "'>" + $days[$i] + "</option>";
      }
    ?>
  </select>
</form>

<?php
  include "footer.php";
?>
