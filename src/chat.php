<?php 

    namespace MyApp;

    use Ratchet\MessageComponentInterface;
    use Ratchet\ConnectionInterface;

    class Chat implements MessageComponentInterface {

        protected $clients;

        public function __construct(){
            $this->clients = new \SplObjectStorage;
            echo('Servidor iniciado');
        }
        
        public function onOpen(ConnectionInterface $conn){//establece una conexion, un usuario se conecta
            $this->clients->attach($conn);

            echo("Nuevo usuario conectado: ({$conn->resourceId})\n");
        }

        public function onMessage(ConnectionInterface $from, $msg){// se mandan mensajes
            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected
                    $client->send($msg);
                }
            }
        }

        public function onClose(ConnectionInterface $conn){//se cierra una conexion y se cierra un usuario
            $this->clients->detach($conn);

            echo("El usuario de la conexion: {$conn->resourceId} se ha desconectado\n");
        }

        public function onError(ConnectionInterface $conn, \Exception $e){//un error en la conexion
            echo "Ha ocurrido un error: {$e->getMessage()}\n";

            $conn->close();
        }
    }


?>