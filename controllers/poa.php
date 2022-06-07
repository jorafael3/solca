<?php


class Poa extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function Poarender()
    {
        $this->view->render('poa/poa');
    }

    function Poa()
    {
        $PErspectivas =  $this->model->Get_Perspectivas_on_load();
        $this->view->Perspect = $PErspectivas;
        $Responsables =  $this->model->Get_Responsables_on_load();
        $this->view->resp = $Responsables;
        $Indicadores =  $this->model->Get_indicadores_on_load();
        $this->view->Indica = $Indicadores;
        $areas =  $this->model->Get_Areas_on_load();
        $this->view->areas = $areas;
        $objetivos =  $this->model->Get_Objetivos_ES_on_load();
        $this->view->objetivos = $objetivos;
        $departamentos =  $this->model->Get_Departamentos_on_load();
        $this->view->departamentos = $departamentos;
        $this->Poarender();
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
    function Nuevo_Poa()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Poa($array);
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
    function Get_Proyectos_Porcentaje_Avance()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Proyectos_Porcentaje_Avance($array);
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

    function Actualizar_Proyecto()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Actualizar_Proyecto($array);
    }

    function Eliminar_Proyecto()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Eliminar_Proyecto($array);
    }
}
