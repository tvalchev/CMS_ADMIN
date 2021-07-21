<?php 
  session_start();
?>

<?php require_once ('../config/config.php'); ?>
<?php require_once ('php_helpers/helpers.php'); ?>

<?php 
  
  if(!isset($_SESSION['account_id']))
  {
    redirect("login");
    exit();
  }
  
  ?>

<?php include "index.html";?>


