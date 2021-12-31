<?php 

    require_once('../../Models/Messages/Message.php');

    class MessageController {

        private $messageModel;

        public function __construct(){
            $this->messageModel = new Messages();
        }
        
        public function createMessage($data, $user, $conversation){
            $response = $this->messageModel->createMessage($data, $user, $conversation);

            if($response == true){
                return true;
            }else{
                return false;
            }
        }
    }

    $mesController = new MessageController();
?>