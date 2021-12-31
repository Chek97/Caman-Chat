<?php 

    class Messages {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function createMessage($name, $user_id, $conversation_id){
            $request = $this->db->prepare("INSERT INTO message VALUES(NULL, :name, :create, :hour, :user, :conver)");
            $request->execute(array(':name' => $name, ':create' => date('Y-m-d'), ':hour' => date('h:i:s'), ':user' => $user_id, ':conver' => $conversation_id));

            $request->rowCount() > 0 ? true : false; 
        }
    }



?>