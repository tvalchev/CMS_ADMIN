<?php 
  session_start();
?>

<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");


if(!isset($_SESSION['account_id']))
{
    redirect("login");
    exit();
}

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if (!is_null($_POST)) 
{
    //print_r($_POST);
    $request = json_decode($_POST['What'], true);
    if (array_key_exists('getAccounts', $request))
    {
        require_once ("../../modules/Account.php");
        $account = new Account;
        echo json_encode($account->getAllAccounts());
    }
}

?>
