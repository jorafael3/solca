<?php


class SecundariaModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function datos($items)
    {

        echo json_encode($items);
        exit();
    }
}
