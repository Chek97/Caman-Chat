<?php 

    require_once('../../Models/Contacts/Contacts.php');
    require_once('../../Models/User/User.php');
    include('../../Helpers/validForm.php');

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

            $validation = validateAddContactForm($data);
            
            if(count($validation) == 0){
                //validar el usuario
                $isUser = $this->userModel->userExist($data['username']);
                if($isUser == []){
                    $_SESSION['message'] = 'No hay ningun usuario llamado "' . $data['username'] . '" en la base de datos';
                    $_SESSION['status'] = 'danger';
                    header('location: ../../Views/contacts/addContact.php');
                }else {
                    $response = $this->contactModel->createContact($data['name'], $data['last_name'], $data['user_id']);
    
                    if($response){
                        $contactNumber = $this->userModel->getContactsNumber($data['user_id']);
                        
                        if($contactNumber !== 0){
                            $contactResponse = $this->userModel->updateUserCount($data['user_id'], $contactNumber['contacts']);
                            
                            if($contactResponse == true){
                                $_SESSION['message'] = 'El contacto fue agregado con exito';
                                $_SESSION['status'] = 'success';
                                header('location: ../../Views/contacts/addContact.php');
                            }else{
                                $_SESSION['message'] = 'El contacto fue agregado parcialmente, pero no se vera reflejado en tu lista de contactos';
                                $_SESSION['status'] = 'warning';
                                header('location: ../../Views/contacts/addContact.php');
                            }
                        }else {
                            $_SESSION['message'] = 'No fue posible actualizar el contacto agregado a tu lista';
                            $_SESSION['status'] = 'warning';
                            header('location: ../../Views/contacts/addContact.php');
                        }
    
                        /* 
                            5. actualizarlos y eliminar (opcional)
                        */
                    }else {
                        echo('No se logro postear el contacto');
                    }
                }
            }else {
                $_SESSION['message'] = 'La informacion del contacto es incorrecta, porfavor intentalo nuevamente';
                $_SESSION['status'] = 'danger';
                $_SESSION['errors'] = $validation;
                header('location: ../../Views/contacts/addContact.php');
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