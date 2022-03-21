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
            $sql = "SELECT CIUDAD_ID, CIUDAD_NOM FROM " . constant("DB") . ".ciudades";
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
            $sql = "SELECT  * from " . constant('DB') . ".usuarios u 
            left join " . constant('DB') . ".ciudades c 
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

    /**
     * ACTUALIZA LOS DATOS DE LOS USUARIOS PEFIL DE USUARIO SETTINGS
     */
    function Actualizar_datos_usuario($parametros)
    {
        try {
            $user_ID = $_SESSION["US_ID"];
            $nombre = $parametros["nombre"];
            $cedula = $parametros["cedula"];
            $celular = $parametros["celular"];
            $ciudad = $parametros["ciudad"];


            $sql = "UPDATE " . constant("DB") . ".usuarios 
                SET 
                US_APELLNOM = :US_APELLNOM, 
                US_NCED= :US_NCED,
                US_CEL=:US_CEL,
                CIUDAD_ID= :CIUDAD_ID
                WHERE US_ID = :US_ID";

            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":US_APELLNOM", $nombre);
            $query->bindParam(":US_NCED", $cedula);
            $query->bindParam(":US_CEL", $celular);
            $query->bindParam(":CIUDAD_ID", $ciudad);
            $query->bindParam(":US_ID", $user_ID);


            if ($query->execute()) {
                // $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
                echo json_encode(true);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
                // return $err;
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }

    function Actualizar_Contrasena($parametros)
    {
        try {
            $user_ID = $_SESSION["US_ID"];
            $con_actual = $parametros["con_actual"];
            $con_nuevo = $parametros["con_nuevo"];

            $user_Contrasena = hash("sha256", $con_actual);
            $user_Contrasena_nueva = hash("sha256", $con_nuevo);

            $val = 0;
            $sql = "SELECT US_CONTRASENA FROM " . constant("DB") . ".usuarios 
                    WHERE US_ID = :US_ID";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":US_ID", $user_ID);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $con = $result[0]["US_CONTRASENA"];
                if ($con == $user_Contrasena) {
                    $val = 1;
                } else {
                    $val = 0;
                }
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }

            if ($val == 1) {
                $sql2 = "UPDATE " . constant("DB") . ".usuarios
                    SET 
                    US_CONTRASENA = :US_CONTRASENA 
                    WHERE US_ID = :US_ID";
                $query2 = $this->db->connect()->prepare($sql2);
                $query2->bindParam(":US_CONTRASENA", $user_Contrasena_nueva);
                $query2->bindParam(":US_ID", $user_ID);
                if ($query2->execute()) {
                    echo json_encode(true);
                    exit();
                } else {
                    echo json_encode(false);
                    exit();
                }
            } else {

                echo json_encode(0);
                exit();
            }
        } catch (PDOException $e) {
            $e = $e->getMessage();
            return $e;
        }
    }
}
