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

        public function getContactById($contact_id){
            $request = $this->db->prepare("SELECT * FROM contacts WHERE id = :id");
            $request->execute(array(':id' => $contact_id));

            if($request->rowCount() > 0){
                return $request->fetch(PDO::FETCH_ASSOC);
            }else {
                return [];
            }
        }

        public function updateContact($contact_id, $info){
            $request = $this->db->prepare("UPDATE contacts SET name= :nam, last_name= :ln WHERE id = :id");
            $request->execute(array(':nam' => $info['name'], ':ln' => $info['last_name'], ':id' => $contact_id));

            if($request->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }

        public function deleteContactById($contact_id){
            $request = $this->db->prepare("DELETE FROM contacts WHERE id = :id");
            $request->execute(array(':id' => $contact_id));

            if($request->rowCount() > 0){
                return true;
            }else {
                return false;
            }
        }
    }

?>