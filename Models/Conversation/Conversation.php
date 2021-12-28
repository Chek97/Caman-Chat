<?php 

    class Conversation {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function getConversations($filter){
            if($filter == 'all'){
                $request = $this->db->prepare("SELECT * FROM conversation");
            }else {
                $request = $this->db->prepare("SELECT members FROM conversation");
            }
            $request->execute(array());
            
            return $request->rowCount() > 0 ? $request->fetchAll(PDO::FETCH_ASSOC) : [];
        }
        
        public function createConversation($name, $members){
            $request = $this->db->prepare("INSERT INTO conversation VALUES(NULL, :name, :memb, 0, :create, :cont)");
            $request->execute(array(':name' => $name, ':memb' => $members, ':create' => date('Y-m-d'), ':cont' => 0));
            
            return $request->rowCount() > 0 ? true : false;
        }
        
        public function getConversationByName($name){
            $request = $this->db->prepare("SELECT id FROM conversation WHERE name= :nam");
            $request->execute(array(':nam' => $name));

            return $request->rowCount() > 0 ? $request->fetch(PDO::FETCH_ASSOC) : [];
        }
    }

?>