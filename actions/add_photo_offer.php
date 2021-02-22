<?php 
require_once ("../../config/config.php");
require_once ("../../lib/Database.php");
require_once ("../../modules/Offers.php");


if(isset($_FILES['file']['name'])){

    print_r($_FILES);

    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $valid_ext = array('png','jpeg','jpg');

    $response = 0;

    $uploadPath = ROOT_PATH."resources/img/offers/".$filename;
    $file_extension = pathinfo($uploadPath,PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    if($filesize<3000000){
        if(in_array($file_extension,$valid_ext)){
            $response = move_uploaded_file($fileTmpName,$uploadPath);     
        }
    }
    else{
        echo "The file is too big";
    }

    echo $response;
    exit;


}

echo 0;

?>