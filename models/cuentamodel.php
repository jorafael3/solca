<?php


class CuentaModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
    function CargarCiudades()
    {

        try {
            $sql="SELECT CIUDAD_ID, CIUDAD_NOM FROM ".constant("DB").".ciudades";
            $query = $this->db->connect()->prepare($sql);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                $err = $query->errorInfo();
                return $err;

            }
        } catch (PDOException $e) {
            //return [];
            $e = $e->getMessage();
            return $e;
        }
    }
    function Cargar_datos_usuario($parametros)
    {

        try {
            $US_ID = $parametros;
            $sql = "SELECT  * from ".constant('DB').".usuarios u 
            left join ".constant('DB').".ciudades c 
            on u.CIUDAD_ID = c.CIUDAD_ID WHERE US_ID = :US_ID";

            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":US_ID", $US_ID);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                // echo json_encode($result);
                // exit();
            } else {
                $err = $query->errorInfo();
                // echo json_encode($err);
                // exit();
                return $err;
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }
}
