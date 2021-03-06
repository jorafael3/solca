<?php
require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";
require_once "config/config.php";
include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new User_Session();
$user = new User();

$data = new Database();

if ($data->connect()) {
    if (isset($_SESSION['SOL_INI_SES'])) {


        $app = new App();
    } else if (isset($_POST['email']) && isset($_POST['password'])) {

        $usuario = $_POST['email'];
        $passForm = $_POST['password'];
        //     $errorpass = "";
        //     $erroruser = "";

        $res = $user->userExist($usuario, $passForm);
        if ($res == "ok") {
            $app = new App();
        }else if($res == "err"){
            $errorlogin = "El usuario se encuentra inactivo";
            include_once 'views/login/login.php';
        }else {
            $errorlogin = "Error, verifique sus credenciales";
            include_once 'views/login/login.php';
        }
    } else {
        include_once 'views/login/login.php';
    }
} else {
    include_once 'views/errores/500.php';
}
