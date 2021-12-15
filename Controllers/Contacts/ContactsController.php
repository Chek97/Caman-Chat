<?php 

    require_once('../../Models/Contacts/Contacts.php');
    require_once('../../Models/User/User.php');

    if(!isset($_SESSION['user']['contacts'])){
        session_start();
    }

    class ContactsController {

        private $contactModel;
        private $userModel;

        public function __construct(){
            $this->contactModel = new Contacts();
            $this->userModel = new User();
        }

        public function getListOfContacts($userId){

            $listOfContacts = $this->contactModel->getContacts($userId);
            return $listOfContacts;
        }

        public function addContactToList($data){
            //validar el usuario
            $isUser = $this->userModel->userExist($data['username']);
            if($isUser == []){
                echo('No hay ningun usuario llamado ' . $data['username'] . ' en la base de datos');
            }else {
                $response = $this->contactModel->createContact($data['name'], $data['last_name'], $data['user_id']);

                if($response){
                    //llamar el numero de contactos del user
                    $contactNumber = $this->userModel->getContactsNumber($data['user_id']);
                    
                    if($contactNumber !== 0){
                        $contactResponse = $this->userModel->updateUserCount($data['user_id'], $contactNumber['contacts']);
                        
                        if($contactResponse == true){
                            echo('Todo funciono bien');
                        }else{
                            echo('Funciono el creado pero no actualizo la lista de contactos');
                        }
                    }

                    /* 
                        3. controlar mensajes de feedback (opcional)
                        5. actualizarlos y eliminar (opcional)
                    */
                }else {
                    echo('No se logro postear el contacto');
                }
            }

            
        }
    }

    $insController = new ContactsController();

    if(isset($_GET['a'])){
        switch ($_GET['a']) {
            case 'add':
                $insController->addContactToList($_POST);
                break; 
            default:
                echo('Comando no permitido');
                break;
        }
    }



?>