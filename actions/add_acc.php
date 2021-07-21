<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Account.php");

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
//$rest_json = file_get_contents("php://input");
//$_POST = json_decode($POST, true);
//print_r($POST);

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['username'];
$password = $data['password'];

$account = new Account;
$addAccount = $account->addAccount($name, $password);


if($addAccount)
{
  echo json_encode(array('response'=>'success'));
}
else
  echo json_encode(array('response'=>'fail'));

?>
