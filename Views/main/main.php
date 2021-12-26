<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <?php 
        include_once('../includes/header.php'); 
        require_once('../../Controllers/User/UserController.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
    ?>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    <div class="main-content">
        <?php 
            require('../includes/session.php'); 
            require_once('./contactsList.php');
        ?>
        <section class="main-conversations">
            <div class="main-pendient">
                <p>Conversaciones pendientes</p>
            </div>
            <div class="main-user-edit">
                <p>
                    Bienvenido Usuario <strong><?php echo($_SESSION['user']['username'])?></strong> 
                    <a href="./editUser.php?id=<?php echo($_SESSION['user']['id']); ?>">Editar <i class="fa fa-pencil" aria-hidden="true"></i></a>
                </p>
            </div>
        </section>
    </div>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>