<?php


class Mantenimiento extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }


    //************************************* *//
    //**** USUARIOS */


    /**
     * Renderiza la vista usuarios
     */
    function Usuariosrender()
    {
        $this->view->render('mantenimiento/usuarios');
    }

    function usuarios()
    {
        $this->Usuariosrender();
    }

    //************************************* *//
    //**** FIN USUARIOS */


    function datos()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->datos($array);
    }
}
