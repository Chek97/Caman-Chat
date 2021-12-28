<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once('../../Controllers/Conversation/ConversationController.php'); 
        include_once('../includes/header.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
    ?>
    <title>Conversation</title>
</head>
<body>
    <?php 
        include_once('../includes/navbar.php'); 
        require('../includes/session.php'); 
    ?>
    

    <?php include_once('../includes/footer.php'); ?>
</body>
</html>