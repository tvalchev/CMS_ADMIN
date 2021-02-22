<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Newsletter.php");


if(isset($_GET['delete'])){
  $newsletter_id = $_GET['delete'];

  $newsletter = new Newsletter;
  $newsletter->deleteNewsletter($newsletter_id);

  header('Location: ../newsletter');
}
?>
