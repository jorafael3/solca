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
        // $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        // $CRITERIO_ID = $parametros["CRITERIO_ID"];
        $POA_ID = $parametros["POA_ID"];
        $ACT_Obs = $parametros["ACT_Obs"];
        // $ACTIV_ACTIVO = $parametros["ACTIV_ACTIVO"];
        // $ACTIV_ELIMINADO = $parametros["ACTIV_ELIMINADO"];
        // $HCREADO = $parametros["HCREADO"];
        // $FCREADO = $ACTIV_FINICIO;
        
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
            $query = $this->db->connect()->prepare("CALL " . constant("DB") . ".create_actividad (?,?,?,?,?,?,?,?) ");
            $query->bindParam(1, $ACTIV_NOM);
            $query->bindParam(2, $ACTIV_RESPONSABLE);
            $query->bindParam(3, $ACTIV_FINICIO);
            $query->bindParam(4, $ACTIV_FFINAL);
            $query->bindParam(5, $PROYECTOA_ID);
            $query->bindParam(6, $OBJEST_ID);
            $query->bindParam(7, $POA_ID);
            $query->bindParam(8, $ACT_Obs);


            if ($query->execute()) {
                //$avence = $this->Guardar_ACtividad_avance($parametros);
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

    function Actualizar_Actividad($parametros)
    {
        $ACTIV_ID = $parametros["ACTV_ID"];
        $ACTV_ESTADO = $parametros["ACTV_ESTADO"];
        // $Progreso = $parametros["Progreso"];

        try {
            $sql = "UPDATE " . constant("DB") . ".poa_proyectos_accion_actividades
            SET ACTV_ESTADO = :ACTV_ESTADO WHERE ACTIV_ID = :ACTIV_ID";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":ACTIV_ID", $ACTIV_ID);
            $query->bindParam(":ACTV_ESTADO", $ACTV_ESTADO);

            if ($query->execute()) {
                $avance = $this->Guardar_ACtividad_avance($parametros);
                echo json_encode($avance);
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
            $ACTIV_ID = $parametros["ACTV_ID"];
            $Progreso_respo = $parametros["Progreso_respo"];
            $Progreso_superv = $parametros["Progreso_superv"];

            $query = $this->db->connect()->prepare("CALL " . constant("DB") . ".create_avance (?,?,?) ");
            $query->bindParam(1, $ACTIV_ID);
            $query->bindParam(2, $Progreso_respo);
            $query->bindParam(3, $Progreso_superv);
            if ($query->execute()) {
                return true;
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

    function Eliminar_Actividad($parametros)
    {
        $ACTIV_ID = $parametros["ACTV_ID"];
        $ACTIV_ACTIVO = "N";
        $ACTIV_ELIMINADO = "S";
        try {
            $sql = "UPDATE " . constant("DB") . ".poa_proyectos_accion_actividades
            SET 
            ACTIV_ACTIVO = :ACTIV_ACTIVO,
            ACTIV_ELIMINADO = :ACTIV_ELIMINADO
            WHERE ACTIV_ID = :ACTIV_ID";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":ACTIV_ACTIVO", $ACTIV_ACTIVO);
            $query->bindParam(":ACTIV_ELIMINADO", $ACTIV_ELIMINADO);
            $query->bindParam(":ACTIV_ID", $ACTIV_ID);


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
