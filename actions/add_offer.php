<?php
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Offers.php");


$POST = filter_var_array($_POST);

$offers_title = $POST['title'];
$offers_title_short = $POST['title_short'];
$offers_destination = $POST['destination'];
$offers_image = 'resources/img/offers/'.$POST['offer_img'];
$offers_transport_type = $POST['transport_type'];
$offers_route = $POST['route'];
$offers_duration = $POST['duration'];
$offers_add_information = $POST['add_information'];
$offers_price = $POST['price'];
$offers_date = $POST['date'];
$offers_program = html_entity_decode($POST['program']);
$offers_prices = html_entity_decode($POST['prices']);
$offers_conditions = html_entity_decode($POST['conditions']);
$offers_excursions = html_entity_decode($POST['excursions']);
$offers_last_minute = $POST['last_minute'];
$offers_supplier = $POST['supplier'];

$offer_data = array(
    'offers_title'=>$offers_title,
    'offers_title_short'=>$offers_title_short,
    'offers_destination'=>$offers_destination,
    'offers_image'=>$offers_image,
    'offers_transport_type'=>$offers_transport_type,
    'offers_route'=>$offers_route,
    'offers_duration'=>$offers_duration,
    'offers_add_information'=>$offers_add_information,
    'offers_price'=>$offers_price,
    'offers_date'=>$offers_date,
    'offers_program'=>$offers_program,
    'offers_prices'=>$offers_prices,
    'offers_conditions'=>$offers_conditions,
    'offers_excursions'=>$offers_excursions,
    'offers_last_minute'=>$offers_last_minute,
    'offers_supplier'=>$offers_supplier
);

$offer = new Offers;
$addOffer = $offer->addOffer($offer_data);

if($addOffer)
{
  echo json_encode(array('response'=>'success'), JSON_FORCE_OBJECT);
}
else
  echo json_encode(array('response'=>'fail'), JSON_FORCE_OBJECT);

?>