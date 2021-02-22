<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Destination.php");

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$destination_name = $POST['destination'];

$destination = new Destination;
$addDestination = $destination->addDestination($destination_name);


if($addDestination)
{
  echo json_encode(array('response'=>'success'), JSON_FORCE_OBJECT);
}
else
  echo json_encode(array('response'=>'fail'), JSON_FORCE_OBJECT);

?>