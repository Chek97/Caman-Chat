<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once('../../Controllers/User/UserController.php');
    require_once('../../Controllers/Conversation/ConversationController.php');
    include_once('../includes/header.php');
    include('../../Helpers/sessionStatus.php');
    isLoggin();

    $chatMembers = explode(',', $_GET['c']);
    $contactInfo = $controller->getUser($chatMembers[1]);

    $conversationId = $ConController->getConversation($_GET['c']);
    ?>
    <title>Conversation</title>
</head>

<body>
    <?php
    include_once('../includes/navbar.php');
    require('../includes/session.php');
    ?>
    <div class="chat-container">
        <header class="chat-content--header">
            <div class="chat-content-img">
                <img class="chat-content-img--image" src="../../Public/files/<?php echo ($contactInfo['photo']); ?>" alt="profile">
            </div>
            <h2><?php echo ($contactInfo['username']); ?></h2> <span class="badge badge-success">En linea</span>
        </header>
        <div class="chat-content--body">
            <div class="message-container">
                <div class="card text-white bg-primary message-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-white">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="message-container d-flex justify-content-end">
                <div class="card text-white bg-secondary message-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-white">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
            <!-- 
                2. guardar en bd los mensajes
                3. cuando traiga definir que caja se va a enviar
             -->
        </div>
        <div class="chat-input-container">
            <input type="hidden" id="user-id" value="<?php echo($chatMembers[0]); ?>">
            <input type="hidden" id="conversation-id" value="<?php echo($conversationId['id']); ?>">
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <button class="btn btn-primary" id="send-message"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
    <script>
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection Establecida !!!");
        };

        conn.onmessage = function(e) {
            var response = JSON.parse(e.data);
            console.log(response.data);
        };
        //conn.send('Hola Mundo');
    </script>
    <script src="../../Public/js/socket.js"></script>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>