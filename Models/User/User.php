<?php 

    class User {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
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

        public function updateUserCount($user_id, $contacts){
            $newContacts = $contacts + 1;
            
            $request = $this->db->prepare("UPDATE user SET contacts = :con WHERE id = :id");
            $request->execute(array(':con' => $newContacts, ':id' => $user_id));

            if($request->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }
    }

?>