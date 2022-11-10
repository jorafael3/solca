<?php


class ReportesModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }
    public function Cargar_Reportes($parametros)
    {
        $id = $parametros["id"];

        try {
            $sql = "CALL " . constant("DB") . ".get_proyectos_areas_avance_por_objetivo_ (?)";
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

    public function Cargar_Reportes_Objetivo($parametros)
    {
        $id = $parametros["id"];

        try {
            $sql = "CALL " . constant("DB") . ".get_avance_objetivo_porcriterio (?)";
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

    public function Cargar_Reportes_Areas($parametros)
    {
        // $id = $parametros["id"];

        try {
            $sql = "CALL " . constant("DB") . ".get_avance_areas";
            $query = $this->db->connect()->prepare($sql);
            // $query->bindParam(1, $id);

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

    public function Cargar_Reportes_Universal($parametros)
    {
        // $id = $parametros["id"];

        try {
            $sql = "CALL " . constant("DB") . ".get_reporte_universal_actividades ";
            $query = $this->db->connect()->prepare($sql);
            // $query->bindParam(1, $id);

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
