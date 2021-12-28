<?php 


    class Members {

        private $db;

        public function __construct(){
            require_once('../../Models/conection.php');
            $this->db = Conection::connect();
        }

        public function createMember($user, $conversation){
            $request = $this->db->prepare("INSERT INTO members VALUES(NULL, :user, :con)");
            $request->execute(array(':user' => $user, ':con' => $conversation));

            return $request->rowCount() > 0 ? true : false;
        }
    }
?>