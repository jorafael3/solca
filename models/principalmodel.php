<?php


class PrincipalModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    /**
     * OBTENER PERSPECTIVAS PARA DASHBOARD SUPERADMIN
     */
    function Get_Resumen($tipo)
    {
        try {
            $sql = "CALL " . constant("DB") . ".resumen (?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $tipo);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                $err = $query->errorInfo();
                return $err;
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }

    function Get_last_projects($tipo)
    {
        try {
            $sql = "CALL " . constant("DB") . ".resumen (?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $tipo);

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
