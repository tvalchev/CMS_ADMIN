<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");


if(isset($_GET['delete'])){
  $account_id = $_GET['delete'];

  require_once ("../../modules/Account.php");
  $account = new Account;
  $account->deleteAccount($account_id);  

  //redirect('../admin/admin_accounts');
  //header('Location: ../admin_accounts');
}
?>
