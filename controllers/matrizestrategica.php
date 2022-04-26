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
        $Riesgostipos =  $this->model->Get_Riesgos_tipos();
        $this->view->ries_tip = $Riesgostipos;
        $this->Matrizrender();
    }
    //*** PERSPECTIVAS ****/
    function Get_Perspectivas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Perspectivas($array);
    }

    function Nueva_perspectiva()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nueva_perspectiva($array);
    }

    //*** CRITERIOS ****/

    function Get_Criterios()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Criterios($array);
    }

    function Nuevo_criterio()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_criterio($array);
    }

    //*** Objetivos_Estrategicos ****/

    function Get_Objetivos_Estrategicos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Objetivos_Estrategicos($array);
    }

    function Nuevo_Obj_Estrategico()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Obj_Estrategico($array);
    }

    //*** Indicadores ****/

    function Get_Indicadores()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Indicadores($array);
    }

    function Nuevo_Indicador()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Indicador($array);
    }
    //*** Riesgos ****/

    function Get_Riesgos()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Riesgos($array);
    }

    function Nuevo_Riesgo()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Riesgo($array);
    }

    //*** Fortalezas ****/

    function Get_Fortalezas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Fortalezas($array);
    }
    function Nuevo_Fortaleza()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Fortaleza($array);
    }
    //*** Oportunidades ****/

    function Get_Oportunidades()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Oportunidades($array);
    }
    function Nuevo_Oportunidad()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Oportunidad($array);
    }
    //*** Debilidades ****/

    function Get_Debilidades()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Debilidades($array);
    }
    function Nuevo_Debilidad()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Debilidad($array);
    }
    //*** Amenazas ****/

    function Get_Amenazas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Amenazas($array);
    }
    function Nuevo_Amenaza()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Nuevo_Amenaza($array);
    }
}
