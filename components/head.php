<?php 
  session_start();
?>

<?php require_once ('../config/config.php'); ?>
<?php require_once ('php_helpers/helpers.php'); ?>

<!DOCTYPE html>
<html lang="bg" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Клио Травел админ панел</title>
    <!-- fav icon generation -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL;?>/resources/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL;?>/resources/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL;?>/resources/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo BASE_URL;?>/resources/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo BASE_URL;?>/resources/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.min.css" rel="stylesheet" />

    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

    <title>ClioTravel</title>

  </head>
  <body class="theme-blue">

  <?php 
  
  if(!isset($_SESSION['account_id']))
  {
    redirect("login");
    exit();
  }
  
  ?>
