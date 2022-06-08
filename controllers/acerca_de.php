<?php


class Acerca_De extends Controller
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function render()
    {
        $this->view->render('acerca_de/about');
    }
}