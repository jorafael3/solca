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

    function Actualizar_usuario()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_usuario($array);
    }

    //************************************* *//
    //**** FIN USUARIOS */
    //************************************* *//


    //************************************* *//
    //**** CREAR DEPARTAMENTOS AREAS */
    //************************************* *//

    function Dept_Areas_render()
    {
        $this->view->render('mantenimiento/deptareas');
    }

    function Nuevos_Departamentos_Areas()
    {
        // $departamentos =  $this->model->Cargar_Departamentos();
        // $this->view->depts = $departamentos;
        // $areas =  $this->model->Cargar_Areas();
        // $this->view->areas = $areas;
        // $servicios =  $this->model->Cargar_Servicio();
        // $this->view->servicios = $servicios;
        // $ciudades =  $this->model->Cargar_Ciudades();
        // $this->view->ciudades = $ciudades;
        // $paises =  $this->model->Cargar_Paises();
        // $this->view->paises = $paises;
        $this->Dept_Areas_render();
    }

    function Cargar_Departamentos()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Departamentos($array);
    }

    
    function Cargar_Areas()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Areas($array);
    }

    function Cargar_Servicio()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Servicio($array);
    }

    function Cargar_Ciudades()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Ciudades($array);
    }

    function Cargar_Paises()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Paises($array);
    }
    //************************************* *//
    //**** FIN CREAR DEPARTAMENTOS AREAS */
    //************************************* *//




}
