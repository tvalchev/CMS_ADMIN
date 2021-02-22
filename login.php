<?php session_start(); ?>

<?php require_once ('../config/config.php'); ?>
<?php require_once ('php_helpers/helpers.php'); ?>
<?php require_once "../lib/Database.php"; ?>
<?php require_once ("../modules/Account.php");?>
<?php //require ('php_helpers/login.php'); ?>

<?php 

    if(ifItIsMethod('post')){
        if(isset($_POST['username']) && isset($_POST['password'])){
            echo "post handle";
            $account = new Account;
            $user_name = $_POST['username'];
            $user_password = $_POST['password'];
            $user = $account->findAccountByUsername($user_name);
            print_r($user);

            if($user){
                $db_password = $user[0]->account_passwd;

                if(password_verify($user_password, $db_password)){
                    // if (PHP_SESSION_ACTIVE!==session_status()) {
                    //     $lifetime = 3600;
                    //     session_set_cookie_params($lifetime,'localhost',true);
                    //     session_name("ClioTravel");
                    //     session_start();
                    // }
                    $_SESSION['account_id'] = $user[0]->account_id;
                    redirect("index");
                    exit();
                }
                else{
                    echo "Wrong ";
                    redirect("../index");
                    exit();
                }
            }
        }else {
            redirect('login');
            exit();
        }

    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Clio Travel</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="../index"><b>Клио Травел</b></a>
            <small>Амин Панел</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Логни се, за да започнеш сесия</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Потребителско име" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Парола" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">ВЛЕЗ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
</body>

</html>