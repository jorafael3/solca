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
        $nivel = $_SESSION["TIPOUS_ID"];
        if ($nivel == 1) {
            $this->view->render('mantenimiento/usuarios');
        } else{
            $this->view->render('errores/404');
        }
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

        $this->Dept_Areas_render();
    }

    function Cargar_Departamentos()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Departamentos($array);
    }

    function Nuevo_Departamento()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Departamento($array);
    }

    function Actualizar_Departamento()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Departamento($array);
    }


    //****** AREAS */


    function Cargar_Areas()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Areas($array);
    }

    function Nueva_Area()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nueva_Area($array);
    }

    function Actualizar_Area()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Area($array);
    }



    /**** SAERVICIOS */

    function Cargar_Servicio()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Servicio($array);
    }

    function Nuevo_Servicio()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Servicio($array);
    }

    function Actualizar_Servicio()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Servicio($array);
    }

    //************** */

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



    function Prespec_crit_render()
    {
        $PErspectivas =  $this->model->Get_Perspectivas(1);
        $this->view->Perspect = $PErspectivas;
        $this->view->render('mantenimiento/perspcrit');
    }


    function Nuevas_perspectivas_Criterios()
    {
        $this->Prespec_crit_render();
    }

    function Get_Perspectivas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Perspectivas(2);
    }

    function Nueva_perspectiva()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nueva_perspectiva($array);
    }

    function Actualizar_perspectiva()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_perspectiva($array);
    }

    //** criterios */
    function Get_Criterios()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Criterios($array);
    }

    function Nuevo_Criterios()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_criterio($array);
    }

    function Actualizar_Criterio()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Criterio($array);
    }

    //** MEDIOS VERIFICAICON */
    function Get_Medios()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Medios($array);
    }

    function Nuevo_Medio()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Medio($array);
    }

    function Actualizar_Medio()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Medio($array);
    }

}
