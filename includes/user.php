<?php
require_once 'libs/database.php';

//include_once 'models/usuario.php';
class User extends Model
{

  
    function userExist($user, $pass)
    {
        try {

            if($user == "" && $pass == ""){

                
            }else{
                return "ok";

            }

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
