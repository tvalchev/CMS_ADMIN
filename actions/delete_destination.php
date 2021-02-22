<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Destination.php");


if(isset($_GET['delete'])){
  $destinations_id = $_GET['delete'];

  $destination = new Destination;
  $destination->deleteDestinations($destinations_id);

  header('Location: ../destinations');
}
?>