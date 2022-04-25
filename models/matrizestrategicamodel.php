<?php


class MatrizEstrategicaModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    function Get_PerspectivasOnLoad()
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

    function Get_Perspectivas()
    {

        try {
            $sql = "CALL " . constant("DB") . ".Perspectivas ";
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

    /********* */

    function Nueva_perspectiva($parametros)
    {
        $PERSPECTIVA_NOM = $parametros["PERSPECTIVA_NOM"];
        try {
            $sql = "CALL " . constant("DB") . ".create_perspectiva (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $PERSPECTIVA_NOM);

            if ($query->execute()) {
                echo json_encode(true);
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

    function Nuevo_criterio($parametros)
    {
        $CRITERIO_NOM = $parametros["CRITERIO_NOM"];
        try {
            $sql = "CALL " . constant("DB") . ".create_criterio (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $CRITERIO_NOM);

            if ($query->execute()) {
                echo json_encode(true);
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


    function Nuevo_Obj_Estrategico($parametros)
    {
        $OBJEST_NOM = $parametros["OBJEST_NOM"];
        $OBJEST_INDICADOR = $parametros["OBJEST_INDICADOR"];
        $OBJEST_MEDIO_VERIF = $parametros["OBJEST_MEDIO_VERIF"];
        $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        $CRITERIO_ID = $parametros["CRITERIO_ID"];

        try {
            $sql = "CALL " . constant("DB") . ".create_objetivo_estrategico (?,?,?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_NOM);
            $query->bindParam(2, $CRITERIO_ID);
            $query->bindParam(3, $PERSPECTIVA_ID);
            $query->bindParam(4, $OBJEST_INDICADOR);
            $query->bindParam(5, $OBJEST_MEDIO_VERIF);

            if ($query->execute()) {
                echo json_encode(true);
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
    /******** */



    function Get_Criterios($parametros)
    {
        $id = $parametros["id_perspectiva"];
        try {
            $sql = "CALL " . constant("DB") . ".criterios (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $id);

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

    function Get_Objetivos_Estrategicos($parametros)
    {
        $criterio_id = $parametros["criterio_id"];
        $perspectiva_id = $parametros["perspectiva_id"];
        try {
            $sql = "CALL " . constant("DB") . ".Objetivos_Estrategicos (?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $criterio_id);
            $query->bindParam(2, $perspectiva_id);

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

    function Get_Indicadores($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".indicadores (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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

    function Get_Riesgos($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".oe_riesgos (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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

    function Get_Fortalezas($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".oe_fortalezas (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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

    function Get_Oportunidades($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".oe_oportunidades (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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

    function Get_Debilidades($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".oe_debilidades (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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

    function Get_Amenazas($parametros)
    {
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".oe_amenazas (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OBJEST_ID);

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
