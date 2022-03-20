<?php
//error_reporting(0);
class Database
{
    private $host;
    private $db;
    private $port;
    private $user;
    private $password;
    private $charset;
    private $pdo;

    public function __construct()
    {

        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->port = constant('PORT');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect()
    {
        try {
            //$connection = "sqlsrv:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            if ($this->pdo) {
                return $this->pdo;
            } else {
                $dns = 'mysql:host=jaimeandresp.sg-host.com:3306;dbname=dbw1p61yhfz2lr';
                $username = 'ugtikepkfhpg6';
                $password = '#`3118&@q{*1';
                try {
                    // $this->pdo = new PDO("mysql:Host=".$this->host.";Database=".$this->db.";Port=".$this->port,$this->user,$this->password); 
                    $this->pdo = new PDO($dns,$username,$password);

                    $options = [
                        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_EMULATE_PREPARES  => true,
                        PDO::ATTR_AUTOCOMMIT => true
                    ];
                    return $this->pdo;
                } catch (PDOException $e) {
                    include_once 'views/errores/500.php';
                }
            }

            //$pdo = new PDO($connection,$this->user,$this->password,$options);
            //return $pdo;

        } catch (PDOException $e) {
            //print_r('Error de conexion: '.$e->getMessage());
            print_r('Error de conexion: ');
        }
    }
}
