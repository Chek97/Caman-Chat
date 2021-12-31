<?php 

    require_once('../../Models/Conversation/Conversation.php');
    require_once('../../Models/Members/Members.php');
    include_once('../../Helpers/verifyConversation.php');

    if(!isset($_SESSION['user'])){
        session_start();
    }

    class ConversationController {

        private $conversationModel;
        private $membersModel;

        public function __construct(){
            $this->conversationModel = new Conversation();
            $this->membersModel = new Members();
        }

        public function getConversationByMembers($user_id, $userContact_id){
            //verificar que la conversacion exista o no
            $conversationsRequest = $this->conversationModel->getConversations('all');
            if($conversationsRequest == []){
                $members = castMembers($user_id, $userContact_id);
                $newConversation = $this->conversationModel->createConversation('Conversasion ' . implode(',', $members), implode(',', $members));

                if($newConversation == true){
                    $conversationId = $this->conversationModel->getConversationByName('Conversasion ' . implode(',', $members));
                    $member1 = $this->membersModel->createMember($user_id, $conversationId['id']);
                    $member2 = $this->membersModel->createMember($userContact_id, $conversationId['id']);
                    if($conversationId !== [] && $member1 == true && $member2 == true){
                        $_SESSION['status'] = 'success';
                        $_SESSION['message'] = 'Conversacion Iniciada';
                        header('location: ../../Views/conversations/chatRoom.php?c=' . $conversationId['id']);        
                    }else {
                        $_SESSION['message'] = 'Ocurrio un error al acceder a esta conversacion creada';
                        $_SESSION['status'] = 'danger';
                        header('location: ../../Views/main/main.php');
                    }
                }else {
                    $_SESSION['message'] = 'Ocurrio un error al acceder a esta conversacion';
                    $_SESSION['status'] = 'danger';
                    header('location: ../../Views/main/main.php');
                }
            }else {
                $conversationsList = $this->conversationModel->getConversations('members');
                $correctConversation = findConversation($conversationsList, $user_id, $userContact_id);
                
                if($correctConversation == []){
                    
                    $members = castMembers($user_id, $userContact_id);
                    $newConversation = $this->conversationModel->createConversation('Conversasion ' . implode(',', $members), implode(',', $members));
                    if($newConversation == true){
                        $conversationId = $this->conversationModel->getConversationByName('Conversasion ' . implode(',', $members));
                        $member1 = $this->membersModel->createMember($user_id, $conversationId['id']);
                        $member2 = $this->membersModel->createMember($userContact_id, $conversationId['id']);
                        if($conversationId !== [] && $member1 == true && $member2 == true){
                            $_SESSION['status'] = 'success';
                            $_SESSION['message'] = 'Conversacion Iniciada';
                            header('location: ../../Views/conversations/chatRoom.php?c=' . $conversationId['id']);        
                        }else {
                            $_SESSION['message'] = 'Ocurrio un error al acceder a esta conversacion creada';
                            $_SESSION['status'] = 'danger';
                            header('location: ../../Views/main/main.php');
                        }
                    }else {
                        $_SESSION['message'] = 'No existe una conversacion que tenga los 2 contactos';
                        $_SESSION['status'] = 'danger';
                        header('location: ../../Views/main/main.php');
                    }
                }else {
                    $_SESSION['status'] = 'success';
                    $_SESSION['message'] = 'Conversacion Iniciada';
                    header('location: ../../Views/conversations/chatRoom.php?c=' . $correctConversation['members']);
                }
            } 
        }

        public function getConversation($members){
            $request = $this->conversationModel->getConversationByMembers($members);

            if($request !== []){
                return $request;
            }else {
                return [];
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
            case 'get':
                $ConController->getConversationByMembers($_GET['id'], $_GET['contactId']);
            default:
                echo('Comando no permitido');
                break;
        }
    }

?>