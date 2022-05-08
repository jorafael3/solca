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


            $query = $this->db->connect()->prepare("CALL " . constant('DB') . ".get_datos_usuarios (?)");
            $query->bindParam(1, $US_ID);

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


            $sql = "CALL " . constant("DB") . ".edit_usuarios_settings (?,?,?,?,?)";

            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $cedula);
            $query->bindParam(3, $celular);
            $query->bindParam(4, $ciudad);
            $query->bindParam(5, $user_ID);


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
                $sql2 = "CALL " . constant("DB") . ".edit_usuarios_settings_contrasena (?,?)";
                $query2 = $this->db->connect()->prepare($sql2);
                $query2->bindParam(1, $user_Contrasena_nueva);
                $query2->bindParam(2, $user_ID);
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
