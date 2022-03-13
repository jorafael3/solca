<?php


class Secundaria extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
    function render()
    {
        $this->view->render('secundaria/secundaria');
    }

    function datos()

    {
        $array = json_decode(file_get_contents("php://input"), true);
        $function = $this->model->datos($array);
    }
}
