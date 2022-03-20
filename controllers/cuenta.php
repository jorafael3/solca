<?php


class Cuenta extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
   //************************************* *//
    //**** PERFIL DE USUARIOS */
    //************************************* *//

    function PerfilUsuariosrender()
    {
        $this->view->render('cuenta/useroverview');
    }

    function Perfil_usuario()
    {
        $user_ID = $_SESSION["US_ID"];
        $Datos_usuario =  $this->model->Cargar_datos_usuario($user_ID);
        $this->view->User_data = $Datos_usuario;
        $this->PerfilUsuariosrender();
    }
    function Cargar_datos_usuario()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_datos_usuario($array);
    }

    //************************************* *//
    //**** FIN PERFIL DE USUARIOS */
    //************************************* *//

     //************************************* *//
    //**** USUARIOS SETTINGS */
    //************************************* *//

    function UsuariosSettingsrender()
    {
        $this->view->render('cuenta/usersettings');
    }

    function Ajustes_usuario()
    {
        $user_ID = $_SESSION["US_ID"];
        $Datos_usuario =  $this->model->Cargar_datos_usuario($user_ID);
        $this->view->User_data = $Datos_usuario;
        $ciudades =  $this->model->CargarCiudades();
        $this->view->ciud = $ciudades;
        $this->UsuariosSettingsrender();
    }
    

    //************************************* *//
    //**** FIN USUARIOS SETTINGS*/
    //************************************* *//

    
}
