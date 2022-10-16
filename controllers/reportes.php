<?php


class Reportes extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
    function PorProyectorender()
    {
        $nivel = $_SESSION["TIPOUS_ID"];
        if ($nivel == 1) {
            $this->view->render('reportes/porproyecto');
        } else {
            $this->view->render('errores/404');
        }
    }

    function PorProyecto()
    {

        $this->PorProyectorender();
    }

    function Cargar_Reportes()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Reportes($array);
    }

    //******************************************************************* */
    //** POR OBJETIVO */

    function PorObjetivorender()
    {
        $nivel = $_SESSION["TIPOUS_ID"];
        if ($nivel == 1) {
            $this->view->render('reportes/porobjetivo');
        } else {
            $this->view->render('errores/404');
        }
    }

    function PorObjetivo()
    {

        $this->PorObjetivorender();
    }

    function Cargar_Reportes_Objetivo()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Reportes_Objetivo($array);
    }

      //******************************************************************* */
    //** POR AREAS */

    function PorAreasrender()
    {
        $nivel = $_SESSION["TIPOUS_ID"];
        if ($nivel == 1) {
            $this->view->render('reportes/porareas');
        } else {
            $this->view->render('errores/404');
        }
    }

    function PorAreas()
    {

        $this->PorAreasrender();
    }

    function Cargar_Reportes_Areas()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Cargar_Reportes_Areas($array);
    }
}
