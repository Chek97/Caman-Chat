<?php 

    require_once('../../Models/Conversation/Conversation.php');
    include_once('../../Helpers/verifyConversation.php');

    if(!isset($_SESSION['user'])){
        session_start();
    }

    class ConversationController {

        private $conversationModel;

        public function __construct(){
            $this->conversationModel = new Conversation();
        }

        public function getConversationByMembers($user_id, $userContact_id){
            //verificar que la conversacion exista o no
            $conversationsRequest = $this->conversationModel->getConversations();
            if($conversationsRequest == []){
                $members = castMembers($user_id, $userContact_id);

                $newConversation = $this->conversationModel->createConversation('Conversasion ' . implode(',', $members), implode(',', $members));

                if($newConversation == true){
                    /* 
                        1. crear una conversacion si ya existen mas conversaciones,
                        2. verificar que los 2 participantes se creen en el lugar de miembros
                        3. verificar que los 2 miembros coincidan con los de la conversacion
                        4. despues de eso que los mande a la zona del chat para empezar a conversar
                    */
                    echo('La conversacion fue creada');
                }else {
                    echo('La conversacion no se pudo crear');
                }
            }else {
                echo('Hay conversaciones');
            } 
        }
    }

    $ConController = new ConversationController();

    if(isset($_GET['a'])){
        switch ($_GET['a']) {
            case 'add':
                //$insController->addContactToList($_POST);
                break; 
            case 'edit':
                //$insController->updateContactData($_POST);
                break;
            case 'delete':
                //$insController->deleteContact($_GET['id']);
                break;
            default:
                echo('Comando no permitido');
                break;
        }
    }

?>