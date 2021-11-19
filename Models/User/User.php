<?php 

    class User {

        private $db;

        public function __construct(){
            require('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function createUser($user, $name, $lastName, $password){

            $request = $this->db->prepare("INSERT INTO user VALUES(NULL, :use, :nam, :las, '', '', 0, :pas)");
            $request->execute(array(':use' => $user, ':nam' => $name, ':las' => $lastName, ':pas' => $password));
            
            if($request->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        public function userExist($user){

            $request = $this->db->prepare("SELECT * FROM user WHERE username= :use");
            $request->execute(array(':use' => $user));

            if($request->rowCount() > 0){
                return $request->fetch(PDO::FETCH_ASSOC);
            }else {
                return [];
            }
        }
    }

?>