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
        $this->view->render('cuenta/perfilusuarios');
    }

    function Perfil_usuario()
    {
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

    
}
