<?php


class Principal extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    /**
     * SE VALIDA EL TIPO DE USUARIO Y SEGUUN ESO MUESTRA SU DASHBOARD
     */
    function render()
    {
        $nivel = $_SESSION["TIPOUS_ID"];
        if ($nivel == 1) {
            $this->DashboardSuperAdmin();
        } else if ($nivel == 2) {
            //$this->DashboardPoa();
        } else if ($nivel == 3) {
            $this->view->render('principal/dashadmin');
        } else if ($nivel == 4) {
            $this->DashboardPoa();

        }
    }

    /**
     * RENDERIZA VISTA DASBOARD SUPERADMIN
     * Y CARGA LAS PERSPECTIVAS
     */

    /*** SUPERADMIN  */
    function DashboardSuperAdmin()
    {
        $resumen =  $this->model->Get_Resumen(1);
        $this->view->resumen = $resumen;
        $servicios =  $this->model->Get_Servicios();
        $this->view->servicios = $servicios;
        $this->view->render('principal/dashsuperadmin');
    }

    function Get_last_projects()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_last_projects(2);
    }

    function Get_Permanencia()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Permanencia($array);
    }

    function Get_Atencion_Servicio()
    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->Get_Atencion_Servicio($array);
    }

    //**** POA */
    function DashboardPoa()
    {
        $resumen =  $this->model->Get_Resumen_area(1,1);
        $this->view->resumen = $resumen;
        $this->view->render('principal/dashpoa');
    }
}
