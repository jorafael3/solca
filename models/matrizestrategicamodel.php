<?php


class MatrizEstrategicaModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    //** PERSPECTIVAS *//

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

    //** CRITERIOS *//

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

    //**OBJETIVOS ESTRATEGICOs */
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

    //** INDICADORES *//

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

    function Get_Medios_verificacion()
    {
        try {
            $sql = "SELECT * FROM " . constant("DB") . ".medio_verificacion ";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
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

    function Nuevo_Indicador($parametros){
        $DESCRIPCION = $parametros["DESCRIPCION"];
        $MVERIFICACION_ID = $parametros["MVERIFICACION_ID"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_indicador (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DESCRIPCION);
            $query->bindParam(2, $OBJEST_ID);
            $query->bindParam(3, $MVERIFICACION_ID);

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

    function Actualizar_Indicador($parametros){
        $DESCRIPCION = $parametros["DESCRIPCION"];
        $INDICADOR_ID = $parametros["INDICADOR_ID"];
        $MVERIFICACION_ID = $parametros["MVERIFICACION_ID"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_indicador (?,?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DESCRIPCION);
            $query->bindParam(2, $INDICADOR_ID);
            $query->bindParam(3, $OBJEST_ID);
            $query->bindParam(4, $MVERIFICACION_ID);

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
    //** RIESGOS *//

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

    function Get_Riesgos_tipos()
    {
        try {
            $sql = "SELECT * FROM " . constant("DB") . ".riesgos_tipos ";
            $query = $this->db->connect()->prepare($sql);

            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
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

    function Nuevo_Riesgo($parametros){
        $RIESGO_NOM = $parametros["RIESGO_NOM"];
        $riesgotipo = $parametros["RIESGOTIPO_ID"];
        $INDICE = $parametros["INDICE"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_riesgo (?,?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $RIESGO_NOM);
            $query->bindParam(2, $INDICE);
            $query->bindParam(3, $riesgotipo);
            $query->bindParam(4, $OBJEST_ID);

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

    function Actualizar_Riesgo($parametros){
        $RIESGO_NOM = $parametros["RIESGO_NOM"];
        $INDICE = $parametros["INDICE"];
        $RIESGOTIPO_ID = $parametros["RIESGOTIPO_ID"];
        $RIESGO_ID = $parametros["RIESGO_ID"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_riesgo (?,?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $RIESGO_ID);
            $query->bindParam(2, $RIESGO_NOM);
            $query->bindParam(3, $INDICE);
            $query->bindParam(4, $RIESGOTIPO_ID);

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
    //** FORTALEZA *//

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

    function Nuevo_Fortaleza($parametros){
        $FORTALEZA_NOM = $parametros["FORTALEZA_NOM"];
        $INDICE = $parametros["INDICE"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_fortaleza (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $FORTALEZA_NOM);
            $query->bindParam(2, $INDICE);
            $query->bindParam(3, $OBJEST_ID);

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

    function Actualizar_Fortaleza($parametros){
        $FORTALEZA_ID = $parametros["FORTALEZA_ID"];
        $FOR_Nombre = $parametros["FOR_Nombre"];
        $FOR_Indice = $parametros["FOR_Indice"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_fortaleza (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $FORTALEZA_ID);
            $query->bindParam(2, $FOR_Nombre);
            $query->bindParam(3, $FOR_Indice);

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
    //** OPORTUNIDADES *//

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

    function Nuevo_Oportunidad($parametros){
        $OPORTUNIDAD_NOM = $parametros["OPORTUNIDAD_NOM"];
        $INDICE = $parametros["INDICE"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_oportunidad (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OPORTUNIDAD_NOM);
            $query->bindParam(2, $INDICE);
            $query->bindParam(3, $OBJEST_ID);

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

    function Actualizar_Oportunidad($parametros){
        $OPORTUNIDAD_ID = $parametros["OPORTUNIDAD_ID"];
        $OPOR_Nombre = $parametros["OPOR_Nombre"];
        $OPOR_Indice = $parametros["OPOR_Indice"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_oportunidad (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OPORTUNIDAD_ID);
            $query->bindParam(2, $OPOR_Nombre);
            $query->bindParam(3, $OPOR_Indice);

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
    //** DEBILIDADES *//

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
    
   

    function Nuevo_Debilidad($parametros){
        $DEBILIDAD_NOM = $parametros["DEBILIDAD_NOM"];
        $INDICE = $parametros["INDICE"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_debilidad (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DEBILIDAD_NOM);
            $query->bindParam(2, $INDICE);
            $query->bindParam(3, $OBJEST_ID);

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

    function Actualizar_Debilidad($parametros){
        $OPORTUNIDAD_ID = $parametros["OPORTUNIDAD_ID"];
        $DEB_Nombre = $parametros["DEB_Nombre"];
        $DEB_Indice = $parametros["DEB_Indice"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_debilidad (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $OPORTUNIDAD_ID);
            $query->bindParam(2, $DEB_Nombre);
            $query->bindParam(3, $DEB_Indice);

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
    //** AMENAZAS *//

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

    function Nuevo_Amenaza($parametros){
        $AMENAZA_NOM = $parametros["AMENAZA_NOM"];
        $INDICE = $parametros["INDICE"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_amenaza (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $AMENAZA_NOM);
            $query->bindParam(2, $INDICE);
            $query->bindParam(3, $OBJEST_ID);

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

    function Actualizar_Amenaza($parametros){
        $AMENAZA_ID = $parametros["AMENAZA_ID"];
        $AME_Nombre = $parametros["AME_Nombre"];
        $AME_Indice = $parametros["AME_Indice"];
        try {
        $sql = "CALL " . constant("DB") . ".edit_amenaza (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $AMENAZA_ID);
            $query->bindParam(2, $AME_Nombre);
            $query->bindParam(3, $AME_Indice);

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
    
}
