<?php

class InfoModel {
  public function __construct() {
    return $this;
  }

  public function getHomepageInfo() {
      $images = array("https://farm2.staticflickr.com/1299/4687826636_f08e0f9fb6.jpg", "https://farm8.staticflickr.com/7370/9412590876_896113666b_k.jpg", "https://farm3.staticflickr.com/2404/2349758304_a0a6c155b3_b.jpg", "https://farm8.staticflickr.com/7199/6858584861_ed1300ccef_b.jpg");
      return (object) array(
        "images" => $images,
        "tagline" => "Cinema reimagined",
        "content" => "<b>Welcome to the new Silverado cinema.</b>
        <br><br>
        We have spent a lot of time thinking about how we can perfect the cinema experience and bring it to you.
        <br><br>
        We have renovated the entire complex with new seats, 3D projection, a Dolby Sound system and that is just the start.
        <br><br>
        There is lots of suprises in store for the entire family, so bring them along and come and see us on our grand reopening. Prepare
        to be amazed and rediscover the cinema experience.",
        "reopenDate" => "Saturday 26th September 8PM",
        "reopenTimestamp" => 1443261600000
      );
  }

  public function getHeaderInfo(){
    return (object) array(
      "title" => "Silverado Cinema",
      "logo" => "images/film-reel.png",
      "logoAlt" => "Sliverado Cinema Logo"
    );
  }

  public function getMenu(){
    return array(
      (object) array("name" => "HOME", "url" => "index.php"),
      (object) array("name" => "CINEMA", "url" => "cinema.php"),
      (object) array("name" => "MOVIES", "url" => "movies.php"),
      (object) array("name" => "CART", "url" => "cart.php"),
      (object) array("name" => "CONTACT", "url" => "contact.php")
    );
  }

}

?>
