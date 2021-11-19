<?php 

    require_once('../../Models/User/User.php');

    class UserController {

        private $userModel;

        public function __construct(){
            //instancia de acciones del usuario
            $this->userModel = new User();
        }

        public function createUser($data){
            $encriptedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $response = $this->userModel->createUser($data['username'], $data['name'], $data['lastName'], $encriptedPassword);

            if($response == true){
                echo('El usuario fue creado con exito');
            }else {
                echo('Algo no se ejecuto correctamente');
            }
        }

        public function validateUser($data){
            $response = $this->userModel->userExist($data['username']);
            if($response != []){
                if(password_verify($data['password'], $response['password'])){
                    echo('El usuario se autentico');
                }else {
                    echo('El usuario no se ha autenticado');
                }
            }else {
                echo('El usuario no exite');
            }
        }

        public function updateUser(){

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
            default:
                echo('Accion no permitida');
        }
    }

?>