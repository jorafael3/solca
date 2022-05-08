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
            $sql = "CALL " . constant("DB") . ".ciudades_all";
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


        $query = "CALL " . constant("DB") . ".create_usuario (?,?,?,?,?,?,?);
        ";

        try {
            $query = $this->db->connect()->prepare($query);
            $query->bindParam(1, $user_name);
            $query->bindParam(2, $user_email);
            $query->bindParam(3, $user_Cedula);
            $query->bindParam(4, $user_Celular);
            $query->bindParam(5, $user_ciudad);
            $query->bindParam(6, $rol);
            $query->bindParam(7, $user_Contrasena);

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
            $sql = "CALL " . constant("DB") . ".get_all_usuarios";
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

            $sql = "CALL  " . constant("DB") . ".edit_usuarios_estado_tipo (?,?,?)";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $US_ACTIVO);
            $query->bindParam(2, $TIPOUS_ID);
            $query->bindParam(3, $US_ID);

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

    function Cargar_Departamentos()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_departamentos";
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


    function Nuevo_Departamento($parametros)
    {
        try {
            $nombre = $parametros["Nombre"];
            $sql = "CALL " . constant("DB") . ".create_departamentos (?) ";;
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $nombre);

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

    function Actualizar_Departamento($parametros)
    {
        try {
            $DEPTO_NOM = $parametros["DEPTO_NOM"];
            $DEPTO_ID = $parametros["DEPTO_ID"];

            $sql = "CALL " . constant("DB") . ".edit_departamentos (?,?) ";;
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DEPTO_NOM);
            $query->bindParam(2, $DEPTO_ID);

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

    function Cargar_Areas()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_areas";
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

    function Cargar_Servicio()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_servicios";
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

    function Cargar_Ciudades()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_ciudades";
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

    function Cargar_Paises()
    {
        try {
            $sql = "CALL " . constant("DB") . ".get_all_paises";
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



    //**************************************** */
    //****** PERSPECTIVCAS CRITERIOS */

    function Get_Perspectivas($tipo)
    {

        try {
            $sql = "CALL " . constant("DB") . ".get_all_perspectivas ";
            $query = $this->db->connect()->prepare($sql);
            if ($query->execute()) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                if ($tipo == 1) {
                    return $result;
                } else {
                    echo json_encode($result);
                    exit();
                }
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

    function Actualizar_perspectiva($parametros)
    {
        $PERSPECTIVA_NOM = $parametros["PERSPECTIVA_NOM"];
        $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".Edit_perspectiva (?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $PERSPECTIVA_NOM);
            $query->bindParam(2, $PERSPECTIVA_ID);

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

    /** CRITERIOS */

    function Get_Criterios()
    {

        try {
            $sql = "CALL " . constant("DB") . ".get_all_criterios ";
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

    function Nuevo_criterio($parametros)
    {
        $CRITERIO_NOM = $parametros["CRITERIO_NOM"];
        $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_criterio (?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $CRITERIO_NOM);
            $query->bindParam(2, $PERSPECTIVA_ID);

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

    function Actualizar_Criterio($parametros)
    {
        $CRITERIO_NOM = $parametros["CRITERIO_NOM"];
        $CRITERIO_ID = $parametros["CRITERIO_ID"];
        $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".edit_criterio (?,?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $CRITERIO_NOM);
            $query->bindParam(2, $CRITERIO_ID);
            $query->bindParam(3, $PERSPECTIVA_ID);

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

    //*** MEDIOS VERIFCACION */

    function Get_Medios()
    {

        try {
            $sql = "CALL " . constant("DB") . ".get_all_medios_verificacion ";
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

    function Nuevo_Medio($parametros)
    {
        $DESCRIPCION = $parametros["DESCRIPCION"];
        // $PERSPECTIVA_ID = $parametros["PERSPECTIVA_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".create_m_verificacion (?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DESCRIPCION);

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

    function Actualizar_Medio($parametros)
    {
        $DESCRIPCION = $parametros["DESCRIPCION"];
        $MVERIFICACION_ID = $parametros["MVERIFICACION_ID"];
        try {
            $sql = "CALL " . constant("DB") . ".edit_m_verificacion (?,?) ";
            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(1, $DESCRIPCION);
            $query->bindParam(2, $MVERIFICACION_ID);

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
