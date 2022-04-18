<?php


class DashSuperAdminModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
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

    function Get_Poa($parametros)
    {
        $criterio_id = $parametros["criterio_id"];
        $perspectiva_id = $parametros["perspectiva_id"];
        try {
            $sql = "CALL " . constant("DB") . ".AreasDepartamentosCriterios (?,?) ";
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

    function Get_Proyectos($parametros)
    {

        $poa_id = $parametros["id_poa"];
        try {
            $sql = "CALL " . constant("DB") . ".proyectos_poa (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $poa_id);

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

    function Get_Proyectos_Detalles($parametros)
    {

        $id_proyecto = $parametros["id_proyecto"];
        try {
            $sql = "CALL " . constant("DB") . ".ActividadesProyectosPOA (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $id_proyecto);

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

    function Nueva_Actividad($parametros)
    {
        $ACTIV_NOM = $parametros["ACTIV_NOM"];
        $ACTIV_RESPONSABLE = $parametros["ACTIV_RESPONSABLE"];
        $ACTIV_FINICIO = $parametros["ACTIV_FINICIO"];
        $ACTIV_FFINAL = $parametros["ACTIV_FFINAL"];
        $PROYECTOA_ID = $parametros["PROYECTOA_ID"];
        $OBJEST_ID = $parametros["OBJEST_ID"];
        $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        $CRITERIO_ID = $parametros["CRITERIO_ID"];
        $POA_ID = $parametros["POA_ID"];
        $ACTIV_ACTIVO = $parametros["ACTIV_ACTIVO"];
        $ACTIV_ELIMINADO = $parametros["ACTIV_ELIMINADO"];
        $HCREADO = $parametros["HCREADO"];
        $FCREADO = $ACTIV_FINICIO;

        try {
            $sql = "INSERT INTO " . constant("DB") . ".poa_proyectos_accion_actividades(
                `ACTIV_NOM`, 
                `ACTIV_RESPONSABLE`, 
                `ACTIV_FINICIO`, 
                `ACTIV_FFINAL`, 
                `PROYECTOA_ID`, 
                `OBJEST_ID`, 
                `PERSPECTIVA_ID`, 
                `CRITERIO_ID`, 
                `POA_ID`, 
                `ACTIV_ACTIVO`, 
                `ACTIV_ELIMINADO`, 
                `FCREADO`, 
                `HCREADO`
                ) VALUES (
                    :ACTIV_NOM,
                    :ACTIV_RESPONSABLE,
                    :ACTIV_FINICIO,
                    :ACTIV_FFINAL,
                    :PROYECTOA_ID,
                    :OBJEST_ID,
                    :PERSPECTIVA_ID,
                    :CRITERIO_ID,
                    :POA_ID,
                    :ACTIV_ACTIVO,
                    :ACTIV_ELIMINADO,
                    :FCREADO,
                    :HCREADO
                )";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":ACTIV_NOM", $ACTIV_NOM);
            $query->bindParam(":ACTIV_RESPONSABLE", $ACTIV_RESPONSABLE);
            $query->bindParam(":ACTIV_FINICIO", $ACTIV_FINICIO);
            $query->bindParam(":ACTIV_FFINAL", $ACTIV_FFINAL);
            $query->bindParam(":PROYECTOA_ID", $PROYECTOA_ID);
            $query->bindParam(":OBJEST_ID", $OBJEST_ID);
            $query->bindParam(":PERSPECTIVA_ID", $PERSPECTIVA_ID);
            $query->bindParam(":CRITERIO_ID", $CRITERIO_ID);
            $query->bindParam(":POA_ID", $POA_ID);
            $query->bindParam(":ACTIV_ACTIVO", $ACTIV_ACTIVO);
            $query->bindParam(":ACTIV_ELIMINADO", $ACTIV_ELIMINADO);
            $query->bindParam(":HCREADO", $HCREADO);
            $query->bindParam(":FCREADO", $FCREADO);

            if ($query->execute()) {
                $avence = $this->Guardar_ACtividad_avance($parametros);
                echo json_encode($avence);
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

    function Guardar_ACtividad_avance($parametros)
    {
        // SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'poa_proyectos_accion_actividades';
        try {

            $query = $this->db->connect()->prepare("SELECT MAX(ACTIV_ID) as ID FROM " . constant("DB") . ".poa_proyectos_accion_actividades");
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $ACTIV_ID = $result[0]["ID"];
                $AVANCE_MES = $parametros["MES_ACTUAL"];
                $AVANCE_ANIO = $parametros["ANIO_ACTUAL"];
                $AVANCE_PORCENTAJE = 0;
                $PROYECTOA_ID = $parametros["PROYECTOA_ID"];
                $HCREADO = $parametros["HCREADO"];
                $FCREADO = $parametros["ACTIV_FINICIO"];

                $sql = "INSERT INTO " . constant("DB") . ".poa_proyectos_accion_actividades_avances(
                    ACTIV_ID, 
                    AVANCE_MES, 
                    AVANCE_ANIO, 
                    AVANCE_PORCENTAJE,
                    PROYECTOA_ID, 
                    FCREADO,
                    HCREADO
                    ) VALUES (
                        :ACTIV_ID, 
                        :AVANCE_MES, 
                        :AVANCE_ANIO, 
                        :AVANCE_PORCENTAJE,
                        :PROYECTOA_ID, 
                        :FCREADO,
                        :HCREADO
                    )";
                $query2 = $this->db->connect()->prepare($sql);
                $query2->bindParam(":ACTIV_ID", $ACTIV_ID);
                $query2->bindParam(":AVANCE_MES", $AVANCE_MES);
                $query2->bindParam(":AVANCE_ANIO", $AVANCE_ANIO);
                $query2->bindParam(":AVANCE_PORCENTAJE", $AVANCE_PORCENTAJE);
                $query2->bindParam(":PROYECTOA_ID", $PROYECTOA_ID);
                $query2->bindParam(":HCREADO", $HCREADO);
                $query2->bindParam(":FCREADO", $FCREADO);

                if ($query2->execute()) {
                    return true;
                } else {
                    $err = $query->errorInfo();
                    return $err;
                }
            } else {
                $err = $query->errorInfo();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }

    function Nuevo_Proyecto($parametros)
    {
        try {
            $PROYECTOA_NOM = $parametros["PROYECTOA_NOM"];
            $PROYECTOA_RESPONSABLE = $parametros["PROYECTOA_RESPONSABLE"];
            $PROYECTOA_INDICADOR = $parametros["PROYECTOA_INDICADOR"];
            $POA_ID = $parametros["POA_ID"];
            $OBJEST_ID = $parametros["OBJEST_ID"];
            $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
            $CRITERIO_ID = $parametros["CRITERIO_ID"];
            $PROYECTOA_META_2022 = $parametros["PROYECTOA_META_2022"];
            $PROYECTOA_META_2023 = $parametros["PROYECTOA_META_2023"];
            $PROYECTOA_ACTIVO = $parametros["PROYECTOA_ACTIVO"];
            $PROYECTOA_ELIMINADO = $parametros["PROYECTOA_ELIMINADO"];
            $FCREADO = $parametros["FCREADO"];
            $HCREADO = $parametros["HCREADO"];
          


            $sql = "INSERT INTO " . constant("DB") . ".poa_proyectos_accion(
                PROYECTOA_NOM, 
                PROYECTOA_RESPONSABLE, 
                PROYECTOA_INDICADOR, 
                POA_ID, 
                OBJEST_ID, 
                PERSPECTIVA_ID, 
                CRITERIO_ID, 
                PROYECTOA_META_2022, 
                PROYECTOA_META_2023, 
                PROYECTOA_ACTIVO, 
                PROYECTOA_ELIMINADO, 
                FCREADO, 
                HCREADO
                )
                VALUES(
                  :PROYECTOA_NOM, 
                  :PROYECTOA_RESPONSABLE, 
                  :PROYECTOA_INDICADOR, 
                  :POA_ID, 
                  :OBJEST_ID, 
                  :PERSPECTIVA_ID, 
                  :CRITERIO_ID, 
                  :PROYECTOA_META_2022, 
                  :PROYECTOA_META_2023, 
                  :PROYECTOA_ACTIVO, 
                  :PROYECTOA_ELIMINADO, 
                  :FCREADO, 
                  :HCREADO
                    
                );";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":PROYECTOA_NOM", $PROYECTOA_NOM);
            $query->bindParam(":PROYECTOA_RESPONSABLE", $PROYECTOA_RESPONSABLE);
            $query->bindParam(":PROYECTOA_INDICADOR", $PROYECTOA_INDICADOR);
            $query->bindParam(":POA_ID", $POA_ID);
            $query->bindParam(":OBJEST_ID", $OBJEST_ID);
            $query->bindParam(":PERSPECTIVA_ID", $PERSPECTIVA_ID);
            $query->bindParam(":CRITERIO_ID", $CRITERIO_ID);
            $query->bindParam(":PROYECTOA_META_2022", $PROYECTOA_META_2022);
            $query->bindParam(":PROYECTOA_META_2023", $PROYECTOA_META_2023);
            $query->bindParam(":PROYECTOA_ACTIVO", $PROYECTOA_ACTIVO);
            $query->bindParam(":PROYECTOA_ELIMINADO", $PROYECTOA_ELIMINADO);
            $query->bindParam(":FCREADO", $FCREADO);
            $query->bindParam(":HCREADO", $HCREADO);

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
