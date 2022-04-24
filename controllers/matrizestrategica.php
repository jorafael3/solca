<?php


class MatrizEstrategica extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    //**************************** */
    //********  MATRIZ ESTRATEGICA */

    function Matrizrender()
    {
        $this->view->render('matrizestrategica/matriz');
    }

    function Matriz_Estrategica()
    {
        $PErspectivas =  $this->model->Get_PerspectivasOnLoad();
        $this->view->Perspect = $PErspectivas;
        $this->Matrizrender();
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

    function Get_Objetivos_Estrategicos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Objetivos_Estrategicos($array);
    }

    function Get_Indicadores()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Indicadores($array);
    }

    function Get_Riesgos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Riesgos($array);
    }

    function Get_Fortalezas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Fortalezas($array);
    }
    function Get_Oportunidades()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Oportunidades($array);
    }

    function Get_Debilidades()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Debilidades($array);
    }

    function Get_Amenazas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Amenazas($array);
    }
}
