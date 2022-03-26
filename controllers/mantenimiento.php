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
    //************************************* *//


    /**
     * Renderiza la vista usuarios
     */
    function Usuariosrender()
    {
        $this->view->render('mantenimiento/usuarios');
    }

    function usuarios()
    {
        $ciudades =  $this->model->CargarCiudades();
        $this->view->ciud = $ciudades;
        $tipos_usuarios =  $this->model->Cargar_tipos_usuarios();
        $this->view->tip_usu = $tipos_usuarios;
        $this->Usuariosrender();
    }

    /**
     * CONTROLER RECIVE PARAMETRSO DE NUEVO USUARIO Y DEVUELVE TRUE O FALSE
     */
    function GuardarNuevoUsuario()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->GuardarNuevoUsuario($array);
    }

    /**
     * CONTROLER RECIVE AJAX PETICION Y EVUELVE LISTA DE USURIOS
     */
    function ListarUsuario()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->ListarUsuario($array);
    }

    //************************************* *//
    //**** FIN USUARIOS */
    //************************************* *//



}
