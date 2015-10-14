<h1>Movies - Now Showing</h1>
<div class='row centre'>
  <div class='movie current-movie'></div>
</div>
<div class='row'>
    <?php
      for ($m = 0; $m < count($categories); $m++){
        ?>
        <div class='row'>
          <div class='col col-3' style='float:left'>
            <img src='<?php echo $movies->$categories[$m]->poster;?>' width='100%' />
          </div>
          <div class='col col-9'>
            <h1><?php echo $movies->$categories[$m]->title; ?></h1>
            <br>
            <img src='<?php echo $movies->$categories[$m]->rating; ?>' width='100px' />
            <br><br>
            <p>
              <?php
              for ($i = 0; $i < count($movies->$categories[$m]->description); $i++){
                echo $movies->$categories[$m]->description[$i] . "<br><br>";
              }
              ?>

            </p>
            <div class='row showmore'>
              <div class='col col-4'>
                <b>Showing times</b>
                <ul>
                  <li>Monday - <?php echo $movies->$categories[$m]->screenings->Monday; ?></li>
                  <li>Tuesday - <?php echo $movies->$categories[$m]->screenings->Tuesday; ?></li>
                  <li>Wednesday - <?php echo $movies->$categories[$m]->screenings->Wednesday; ?></li>
                  <li>Thursday - <?php echo $movies->$categories[$m]->screenings->Thursday; ?></li>
                  <li>Friday - <?php echo $movies->$categories[$m]->screenings->Friday; ?></li>
                  <li>Saturday - <?php echo $movies->$categories[$m]->screenings->Saturday; ?></li>
                  <li>Sunday - <?php echo $movies->$categories[$m]->screenings->Sunday; ?></li>
                </ul>
              </div>
              <div class='col col-4'>
                <video src='<?php echo $movies->$categories[$m]->trailer;?>' controls></video>
              </div>
            </div>
            <br>
            <a href='javascript:void(0)' onclick='$(this).parent().find(".showmore").slideToggle();return false;' class='bookbtn'>Show / hide info</a>
            <a href='book.php?movie=<?php echo $categories[$m]; ?>' class='bookbtn'>Book now</a>
          </div>
        </div>
        <br><br><br><br>
        <?php
      }
    ?>

</div>
<br>
<h3>Our schedule</h3>
<br>
<b>Monday - Tuesday</b>
<br><br>
<div class='schedule-bar schedule-childrens'>Childrens (1PM)</div>
<div class='schedule-bar schedule-art'>Art / Foreign (6PM)</div>
<div class='schedule-bar schedule-romance'>Romantic Comedy (9PM)</div>
<br><br>
<b>Wednesday - Friday</b>
<br><br>
<div class='schedule-bar schedule-romance'>Romantic Comedy (1PM)</div>
<div class='schedule-bar schedule-childrens'>Childrens (6PM)</div>
<div class='schedule-bar schedule-action'>Action (9PM)</div>
<br><br>
<b>Saturday - Sunday</b>
<br><br>
<div class='schedule-bar schedule-childrens'>Childrens (12PM)</div>
<div class='schedule-bar schedule-art'>Art / Foreign (3PM)</div>
<div class='schedule-bar schedule-romance'>Romantic Comedy (6PM)</div>
<div class='schedule-bar schedule-action'>Action (9PM)</div>
<br><br>
<h3>Pricing</h3>
<br>
<table>
  <tr>
    <th>Ticket</th>
    <th>Monday - Tuesday</th>
    <th>Wednesday - Friday</th>
    <th>Wednesday - Friday (1pm session)</th>
    <th>Saturday - Sunday</th>
  </tr>
  <tr>
    <td>Standard­ Adult</td>
    <td>$12.00</td>
    <td>$18.00</td>
    <td>$12.00</td>
    <td>$18.00</td>
  </tr>
  <tr>
    <td>Standard­ Concession</td>
    <td>$10.00</td>
    <td>$15.00</td>
    <td>$10.00</td>
    <td>$15.00</td>
  </tr>
  <tr>
    <td>Standard­ Child</td>
    <td>$8.00</td>
    <td>$12.00</td>
    <td>$8.00</td>
    <td>$12.00</td>
  </tr>
  <tr>
    <td>First Class­ Adult</td>
    <td>$25.00</td>
    <td>$30.00</td>
    <td>$25.00</td>
    <td>$30.00</td>
  </tr>
  <tr>
    <td>First Class­ Child</td>
    <td>$20.00</td>
    <td>$25.00</td>
    <td>$20.00</td>
    <td>$25.00</td>
  </tr>
  <tr>
    <td>Beanbag (Any)</td>
    <td>$20.00</td>
    <td>$30.00</td>
    <td>$20.00</td>
    <td>$30.00</td>
  </tr>
</table>
<br><br>
<script>
$(".showmore").hide();
//Only run animation if non mobile
if ($(document).width() > 768){
  $(".current-movie").hide();
  $(".movie-info-holder").hide();
  $(".movie").on("click", function(){
    $(".movie").css("width","20%");
    $(".movie").show();
    $(".movie-info-holder").hide();
    $(this).hide();
    $(".current-movie").html($(this).html());
    $(".current-movie").css("background-image", $(this).css("background-image"));
    $(".current-movie").css("width","100%");
    $(".current-movie").find(".movie-info-holder").fadeIn("slow");
  });

  $(".btn-close").on("click", function(){
    $(".current-movie").hide();
    $(".movie").show();
  });
}
</script>
