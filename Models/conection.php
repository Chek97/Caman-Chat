<?php 

    require('../../Config/Config.php');
    class Conection {

        public function __construct(){
            $this->connect();
        }

        public static function connect(){
            try {
                
                $conn = new PDO('mysql:dbname=' . DBNAME . ';host=' . HOST , DBUSER, PASSWORD);

                return $conn;

            } catch (Exception $exception) {
                echo('Error en la conexion ' . $exception->getMessage());
                exit;
            }
        }
    }


?>