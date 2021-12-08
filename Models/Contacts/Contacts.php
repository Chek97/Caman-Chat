<?php 

    class Contacts {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function createContact($name, $lastName, $userId){

            $request = $this->db->prepare("INSERT INTO contacts VALUES(NULL, :nam, :las, :useid)");
            $request->execute(array(':nam' => $name, ':las' => $lastName, ':useid' => $userId));
            
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
                return $request->fetchAll(PDO::FETCH_ASSOC);
            }else {
                return [];
            }
        }
    }

?>