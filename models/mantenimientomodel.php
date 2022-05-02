<?php


class MantenimientoModel extends Model
{

    function __construct()
    {

        parent::__construct();
        //$this->view->render('principal/index');
        //echo "nuevo controlaodr";
    }

    //**************************************** */
    //**************  USUARIOS */

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

    function Cargar_tipos_usuarios()
    {
        try {
            $sql = "SELECT * FROM " . constant("DB") . ".tipos_usuarios";
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

    function GuardarNuevoUsuario($parametros)
    {

        $user_name =  $parametros["user_name"];
        $user_email =  $parametros["user_email"];
        $user_Cedula =  $parametros["user_Cedula"];
        $user_Celular =  $parametros["user_Celular"];
        $user_ciudad =  $parametros["user_ciudad"];
        $user_Contrasena =  $parametros["user_Contrasena"];
        $rol =  $parametros["rol"];

        $user_Contrasena = hash("sha256", $user_Contrasena);
        $user_status = "S";


        $query = "INSERT INTO " . constant("DB") . ".usuarios(
            US_APELLNOM, 
            US_EMAIL, 
            US_NCED, 
            US_CEL, 
            US_ACTIVO, 
            CIUDAD_ID, 
            TIPOUS_ID, 
            US_CONTRASENA 
            )
        VALUES(
            :US_APELLNOM, 
            :US_EMAIL, 
            :US_NCED, 
            :US_CEL, 
            :US_ACTIVO, 
            :CIUDAD_ID, 
            :TIPOUS_ID, 
            :US_CONTRASENA 
        );
        ";

        try {
            $query = $this->db->connect()->prepare($query);
            $query->bindParam(":US_APELLNOM", $user_name);
            $query->bindParam(":US_NCED", $user_Cedula);
            $query->bindParam(":US_CEL", $user_Celular);
            $query->bindParam(":US_ACTIVO", $user_status);
            $query->bindParam(":CIUDAD_ID", $user_ciudad);
            $query->bindParam(":TIPOUS_ID", $rol);
            $query->bindParam(":US_CONTRASENA", $user_Contrasena);

            if ($query->execute()) {
                $result = true;
                echo json_encode($result);
                exit();
            } else {
                $err = $query->errorInfo();
                echo json_encode($err);
                exit();
            }
        } catch (PDOException $e) {
            //return [];
            $e = $e->getMessage();
            return $e;
        }
    }

    function ListarUsuario()
    {
        try {
            $sql = "SELECT 
            us.US_ID,
            us.US_APELLNOM, 
            us.US_EMAIL, 
            us.US_ACTIVO, 
            us.TIPOUS_ID, 
            tp.TIPOUS_NOM
            FROM " . constant("DB") . ".usuarios us
            left join " . constant("DB") . ".tipos_usuarios tp 
            ON us.TIPOUS_ID = tp.TIPOUS_ID";
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

    function Actualizar_usuario($parametros)
    {
        try {

            $US_ID = $parametros["US_ID"];
            $US_ACTIVO = $parametros["US_ACTIVO"];
            $TIPOUS_ID = $parametros["TIPOUS_ID"];

            $sql = "UPDATE " . constant("DB") . ".usuarios
            SET
            US_ACTIVO =:US_ACTIVO,
            TIPOUS_ID =:TIPOUS_ID
            WHERE US_ID =:US_ID";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(":US_ACTIVO", $US_ACTIVO);
            $query->bindParam(":TIPOUS_ID", $TIPOUS_ID);
            $query->bindParam(":US_ID", $US_ID);

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


     //**************************************** */
    //**************  NUEVO AREAS DEPTS */

    function Cargar_Departamentos(){
        try {
            $sql = "SELECT *
            FROM " . constant("DB") . ".departamentos";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
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

    function Cargar_Areas(){
        try {
            $sql = "SELECT *
            FROM " . constant("DB") . ".areas";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
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

    function Cargar_Servicio(){
        try {
            $sql = "SELECT *
            FROM " . constant("DB") . ".servicios";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
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

    function Cargar_Ciudades(){
        try {
            $sql = "SELECT *
            FROM " . constant("DB") . ".ciudades";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
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

    function Cargar_Paises(){
        try {
            $sql = "SELECT *
            FROM " . constant("DB") . ".paises";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // return $result;
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
