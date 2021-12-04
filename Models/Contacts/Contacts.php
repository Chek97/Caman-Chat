<?php 

    class Contacts {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function createContact($user, $name, $lastName, $password){

            $request = $this->db->prepare("INSERT INTO user VALUES(NULL, :use, :nam, :las, '', '', 0, :pas)");
            $request->execute(array(':use' => $user, ':nam' => $name, ':las' => $lastName, ':pas' => $password));
            
            if($request->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        public function getContacts($id){

            $request = $this->db->prepare("SELECT * FROM contacts WHERE user_id= :id");
            $request->execute(array(':id' => $id));

            if($request->rowCount() > 0){
                return $request->fetch(PDO::FETCH_ASSOC);
            }else {
                return [];
            }
        }
    }

?>