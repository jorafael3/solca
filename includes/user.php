<?php
require_once 'libs/database.php';

//include_once 'models/usuario.php';
class User extends Model
{


    function userExist($user, $pass)
    {
        try {

            if ($user == "" && $pass == "") {
            } else {

                $user_Contrasena = hash("sha256", $pass);

                $query = $this->db->connect()->prepare("SELECT * from " . constant("DB") . ".usuarios WHERE US_EMAIL = :US_EMAIL AND US_CONTRASENA =:US_CONTRASENA");
                $query->bindParam(":US_EMAIL", $user);
                $query->bindParam(":US_CONTRASENA", $user_Contrasena);
                $query->execute();
                if ($query->rowCount()) {
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    $tipo = "";
                    $US_EMAIL = "";
                    $US_NOMBRE = "";
                    $US_ID = "";
                    $TIPOUS_ID = "";
                    foreach ($result as $row) {
                        $US_EMAIL = $row["US_EMAIL"];
                        $US_NOMBRE = $row["US_APELLNOM"];
                        $US_ID = $row["US_ID"];
                        $TIPOUS_ID = $row["TIPOUS_ID"];
                        $tipo = $row["US_ACTIVO"];
                    }
                    // return $tipo;

                    if ($tipo == "S") {
                        $_SESSION['SOL_INI_SES'] = true;
                        $_SESSION["US_EMAIL"] = $US_EMAIL;
                        $_SESSION["US_NOMBRE"] = $US_NOMBRE;
                        $_SESSION["US_ID"] = $US_ID;
                        $_SESSION["TIPOUS_ID"] = $TIPOUS_ID;
                        return "ok";
                    } else {
                        return "err";
                    }
                }
            }
            // echo $_SERVER['SERVER_ADDR']."<br/>"; //Imprime la IP del servidor
            // echo $_SERVER['SERVER_NAME']."<br/>"; //Imprime el nombre del servidor
            // echo $_SERVER['SERVER_SOFTWARE']."<br/>"; //Imprime el software que usa el servidor
            // echo $_SERVER['SERVER_PROTOCOL']."<br/>"; //Imprime el protocolo usado
            // echo $_SERVER['REQUEST_METHOD']."<br/>"; //Imprime el método de petición empleado
            // echo $_SERVER['REQUEST_TIME']."<br/>";  //Imprime el tiempo de respuesta
            // echo $_SERVER['HTTP_USER_AGENT']."<br/>"; /*Imprime la información de S.O y navegador del cliente*/
            // echo $_SERVER["REMOTE_ADDR"]."<br/>";  //Imprime la dirección IP del cliente
            // /*Imprime puerto empleado por la máquina del usuario para comunicarse con el servidor web. */
            // echo $_SERVER["REMOTE_PORT"]."<br/>";
            // $ip=getenv('REMOTE_ADDR');

            // $usu = "";
            // $tipo = "";
            // $Nivel = "";
            // $query = $this->db->connect()->prepare("select * from inv_users");
            // $query->execute();
            // $result = $query->fetchAll();
            // if ($query->rowCount()) {
            //     try {
            //         foreach ($result as $row) {
            //             $usu   = $row['Usuario'];
            //             $tipo = $row['Tipo'];
            //             $nivel = $row['Nivel'];
            //             $ID = $row['usuarioID'];
            //         }
            //         // echo ($usu);
            //         //echo ($estado);
            //         if ($usu == "ERROR" or $usu == null or $nivel == "ERROR") {
            //             return  false;
            //         } else {
            //             $_SESSION['iniciosesion'] = true;
            //             $_SESSION['Usuario'] = $usu;
            //             $_SESSION['Email'] = $user;
            //             $_SESSION['Tipo'] = $tipo;
            //             $_SESSION['usuarioID'] = $ID;
            //             $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
            //             $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];


            //             return true;
            //         }
            //     } catch (Exception $e) {
            //         echo $e->getMessage();
            //     }
            // } else {
            //     echo "error";
            //     return false;
            //     //exit();
            // }
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }



    public function Intentos()
    {
        try {
            $usuarioId = "";
            $query = $this->db->connect()->prepare("{ CALL CSD_Login_user (?,?)}");
            $query->bindParam(1, $usuarioId, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
        }
    }
}
