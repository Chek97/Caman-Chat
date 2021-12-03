<?php 

    require_once('../../Models/User/User.php');
    include('../../Helpers/validForm.php');
    session_start();

    class UserController {

        private $userModel;

        public function __construct(){
            //instancia de acciones del usuario
            $this->userModel = new User();
        }

        public function createUser($data){
            //validar campos
            $validation = validateFormFields($data);
            
            if(count($validation) == 0){
                $encriptedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
                $response = $this->userModel->createUser($data['username'], $data['name'], $data['lastName'], $encriptedPassword);
    
                if($response == true){
                    $_SESSION['message'] = 'El usuario fue creado con exito';
                    $_SESSION['status'] = 'success';
                    header('location: ../../Views/login/register.php');
                }else {
                    $_SESSION['message'] = 'El usuario no pudo ser creado';
                    $_SESSION['status'] = 'danger';
                    header('location: ../../Views/login/register.php');
                }
            }else {
                $_SESSION['message'] = 'No se puedo realizar el registro, porfavor intentalo nuevamente';
                $_SESSION['status'] = 'danger';
                $_SESSION['errors'] = $validation;
                header('location: ../../Views/login/register.php');
            }


        }

        public function validateUser($data){
            //validar campos
            $validation = validateFormFields($data);
            if(count($validation) == 0){
                $response = $this->userModel->userExist($data['username']);
                if($response != []){
                    if(password_verify($data['password'], $response['password'])){
                        $_SESSION['user'] = array('username' => $response['username'], 'id' => $response['id']);
                        header('location: ../../Views/main/main.php');
                    }else {
                        $_SESSION['message'] = 'Usuario y/o contraseña incorrecta(s)';
                        $_SESSION['status'] = 'danger';
                        header('location: ../../Views/login/login.php');
                    }
                }else {
                    $_SESSION['message'] = 'El usuario no existe';
                    $_SESSION['status'] = 'danger';
                    header('location: ../../Views/login/login.php');
                }
            }else{
                $_SESSION['message'] = 'No se inicio la session';
                $_SESSION['status'] = 'danger';
                $_SESSION['errors'] = $validation;
                header('location: ../../Views/login/login.php');
            }


        }

        public function updateUser(){

        }

        public function logOut(){
            session_unset();
            session_destroy();
            header('location: ../../Views/login/login.php');
        }
        
    }

    $controller = new UserController();

    if(isset($_GET['a'])){
        switch ($_GET['a']) {
            case 'create':
                $controller->createUser($_POST);
                break;
            case 'get':
                break;
            case 'update':
                break;
            case 'validate':
                $controller->validateUser($_POST);
                break;
            case 'logout':
                $controller->logOut();
                break;
            default:
                echo('Accion no permitida');
        }
    }

?>