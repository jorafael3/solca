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

    function Get_Servicios()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_servicios_atenciones";
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

    //*** DASHBOARD SUPER ADMIN CARTILLA PERMANENCIA */

    function Get_Permanencia($parametros)
    {
        try {
            $servicio = $parametros["SERV"];
            $sql = "CALL " . constant("DB") . ".get_Permanencia_Solca (?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $servicio);

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

    function Get_Atencion_Servicio($parametros)
    {
        try {
            $anio = $parametros["ANIO"];
            $servicio = $parametros["SERV"];
            $sql = "CALL " . constant("DB") . ".ResumenAtencionPorServicio (?,?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $anio);
            $query->bindParam(2, $servicio);

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

    function Get_Atencion_Servicio_tabla($parametros)
    {
        try {
            $anio = $parametros["ANIO"];
            $servicio = $parametros["SERV"];
            $sql = "CALL " . constant("DB") . ".TablaAtencionPorServicio (?,?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $anio);
            $query->bindParam(2, $servicio);

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



    //*** POA */

    function Get_Resumen_area($tipo)
    {
        try {
            $area = $_SESSION["AREA_ID"];
            $sql = "CALL " . constant("DB") . ".resumen_area (?,?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $tipo);
            $query->bindParam(2, $area);

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
