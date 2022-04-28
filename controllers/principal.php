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
            $this->view->render('principal/dasharea');
        } else if ($nivel == 3) {
            $this->view->render('principal/dashadmin');
        } else if ($nivel == 4) {
            $this->view->render('principal/dashpoa');
        }
    }

    /**
     * RENDERIZA VISTA DASBOARD SUPERADMIN
     * Y CARGA LAS PERSPECTIVAS
     */

    function DashboardSuperAdmin()
    {
        $PErspectivas =  $this->model->Get_Perspectivas();
        $this->view->Perspect = $PErspectivas;
        $Responsables =  $this->model->Get_Responsables();
        $this->view->resp = $Responsables;
        $Indicadores =  $this->model->Get_indicadores();
        $this->view->Indica = $Indicadores;
        $this->view->render('principal/dashsuperadmin');

        
    }
}
