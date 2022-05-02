<?php
require_once "controllers/errores.php";
class App
{

    function __construct()
    {

        //echo "<p>nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $archivocontroller = 'controllers/principal.php';
            require_once $archivocontroller;
            $controller = new Principal();
            $controller->loadModel('principal');
            $controller->render();
            return false;
        }
        $archivocontroller = 'controllers/' . $url[0] . '.php';
        if (file_exists($archivocontroller)) {
            require_once $archivocontroller;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //nelemento arreglo
            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {


                    $param = [];
                    for ($i = 1; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    try {
                        $controller->{$url[1]}();
                    } catch (Exception $e) {
                        include_once 'views/errores/500.php';
                    }
                }
            } else {
                try {
                    $controller->render();
                } catch (Exception $e) {
                    include_once 'views/errores/500.php';
                }
            }
        } else {
            $controller = new Errores();
        }
    }
}
