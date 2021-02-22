<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Offers.php");


if(isset($_GET['delete'])){
  $offer_id = $_GET['delete'];

  $offer = new Offers;
  $offer->deleteOffer($offer_id);

  header('Location: ../review_offers');
}
?>