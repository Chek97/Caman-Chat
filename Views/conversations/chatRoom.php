<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once('../../Controllers/Conversation/ConversationController.php'); 
        include_once('../includes/header.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();

        $ConController->getConversationByMembers($_GET['id'], $_GET['contactId']);
    ?>
    <title>Conversation</title>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    

    <?php include_once('../includes/footer.php'); ?>
</body>
</html>