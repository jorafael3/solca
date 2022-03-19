<?php


class MantenimientoModel extends Model
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
            $sql="SELECT CIUDAD_ID, CIUDAD_NOM FROM ".constant("DB").".ciudades";
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
            $query->bindParam(":US_EMAIL", $user_email);
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
            US_APELLNOM, 
            US_EMAIL,
            US_ACTIVO,
            TIPOUS_ID 
            FROM " . constant("DB") . ".usuarios";
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
}
