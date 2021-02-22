<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/ContactUs.php");


if(isset($_GET['delete'])){
  $contact_us_id = $_GET['delete'];

  $contact_us = new ContactUs;
  $contact_us->deleteMessage($contact_us_id);

  header('Location: ../contact_us');
}
?>
