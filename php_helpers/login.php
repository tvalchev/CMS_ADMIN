<?php
require_once "../../lib/Database.php";
require_once "../../modules/Account.php";

    function isLoggedIn(){

        if(isset($_SESSION['account_id'])){
            return true;
        }
       return false;
    }

    function login($POST)
    {
        echo "Call login";
        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        if(isset($_POST['username'])){
            echo "Loginnn";
            $account = new Account;
            $user_name = $_POST['username'];
            $user_password = $_POST['password'];
            echo "Loginnn 222";
            $user = $account->findAccountByUsername($user_name);
            echo "Loginnn 333";

            if($user){
                $db_password = $user->account_passwd;

                if(password_verify($user_password, $db_password)){
                    $login_user = createAccountSession($user);
                    redirect("../login.php");
                }
                else{
                    redirect("../../index.php");
                }
            }
        }

    }

    function createAccountSession($account){
        $_SESSION['account_id'] = $account->account_id;
    }

?>