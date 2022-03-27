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
    function Get_Perspectivas()
    {

        try {
            $sql = "CALL " . constant("DB") . ".Perspectivas ";
            $query = $this->db->connect()->prepare($sql);
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
}
