<?php


class MantenimientoModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function GuardarNuevoUsuario($parametros)
    {

        echo json_encode($parametros);
        exit();

        $id =  $parametros["id"];

        $query = "{CALL VEN_Competencias_Datos_Mayoristas (?)}";

        try {
            $query = $this->db->connect()->prepare($query);
            $query->bindParam(1, $id, PDO::PARAM_STR);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            //return [];
            $e = $e->getMessage();
            return $e;
        }
    }

    function ListarUsuario()
    {
        try {
            $sql = "SELECT 
            US_APELLNOM, 
            US_EMAIL,
            US_ACTIVO,
            TIPOUS_ID 
            FROM ".constant("DB").".usuarios";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }
}
