<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once(dirname(__DIR__)."/model/InfoModel.php");
include_once(dirname(__DIR__)."/model/MovieModel.php");
include_once(dirname(__DIR__)."/model/ContactModel.php");
include_once(dirname(__DIR__)."/model/CartModel.php");
include_once(dirname(__DIR__)."/model/CheckoutModel.php");

class Controller {

  public function __construct(){
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    return $this;
  }

  public function render($page, $opts = array()){
    $infoModel = new InfoModel();
    $info = $infoModel->getHeaderInfo();
    $menu = $infoModel->getMenu();
    include dirname(__DIR__)."/view/Header.php";

    if ($page == "home"){
      $info = $infoModel->getHomepageInfo();
      include dirname(__DIR__)."/view/Home.php";
    }

    if ($page == "movies"){
      $model = new MovieModel();
      $movies = $model->getMovies();
      $categories = $model->getMovieCategories();
      include dirname(__DIR__)."/view/Movies.php";
    }

    if ($page == "cinema"){
      include dirname(__DIR__)."/view/Cinema.php";
    }

    if ($page == "book"){
      $model = new MovieModel();
      $movie = $model->getMovieByType($_GET["movie"]);
      $category = $_GET['movie'];
      include dirname(__DIR__)."/view/Book.php";
    }

    if ($page == "contact"){
      $model = new ContactModel();
      $message = $model->getMessage();
      $types = $model->getContactTypes();
      include dirname(__DIR__)."/view/Contact.php";
    }

    if ($page == "cart"){
      $cart = new CartModel();
      include dirname(__DIR__)."/view/Cart.php";
    }

    if ($page == "checkout"){
      $checkout = new CheckoutModel();
      $cart = new CartModel();
      include dirname(__DIR__)."/view/Checkout.php";
    }

    if ($page == "ticket"){
      $checkout = new CheckoutModel();
      $ticket = $checkout->getTicket();
      $cart = new CartModel();
      include dirname(__DIR__)."/view/Ticket.php";
    }

    include dirname(__DIR__)."/view/Footer.php";
  }

  public function renderModule($module, $opts = array()){
    if ($module == "reservation"){
      $cart = new CartModel();
      $reservation = $cart->getReservation($opts);
      $reservation->id = $opts;
      include dirname(__DIR__)."/view/Reservation.php";
    }
  }

  public function redirect($location){
    header("Location: " . $location);
  }

}
?>
