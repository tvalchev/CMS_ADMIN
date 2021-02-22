<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Account.php");

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$name = $POST['username'];
$password = $POST['password'];

$account = new Account;
$addAccount = $account->addAccount($name, $password);


if($addAccount)
{
  echo json_encode(array('response'=>'success'), JSON_FORCE_OBJECT);
}
else
  echo json_encode(array('response'=>'fail'), JSON_FORCE_OBJECT);

?>
