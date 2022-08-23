<?php


class DashSuperAdmin extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function Get_Perspectivas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Perspectivas($array);
    }
    function Get_Criterios()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Criterios($array);
    }
    function Get_Poa()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Poa($array);
    }
    function Get_Proyectos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Proyectos($array);
    }
    function Get_Proyectos_Detalles()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Proyectos_Detalles($array);
    }

    function Nueva_Actividad()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nueva_Actividad($array);
    }

    function Actualizar_Actividad()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Actividad($array);
    }

    function Eliminar_Actividad()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Eliminar_Actividad($array);
    }

    function Nuevo_Proyecto()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Proyecto($array);
    }

  
   
}
