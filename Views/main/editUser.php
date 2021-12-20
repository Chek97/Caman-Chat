<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Usuario</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php 
        require_once('../../Controllers/User/UserController.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
        include_once('../includes/navbar.php');

        $userInfo = $controller->getUser($_GET['id']);
    ?>
    <a href="./main.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <section class="login-container"> 
        <?php require('../includes/session.php'); ?>
        <header>
            <h1>Editar Usuario</h1>
        </header>
        <form action="../../Controllers/User/UserController.php?a=update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo($userInfo['id']); ?>">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" aria-describedby="helpId" value="<?php echo($userInfo['name']); ?>">
              <?php if(isset($_SESSION['errors']['name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['name'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="last_name">Apellido</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos" aria-describedby="helpId" value="<?php echo($userInfo['last_name']); ?>">
              <?php if(isset($_SESSION['errors']['last_name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['last_name'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="username">Usuario</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId" value="<?php echo($userInfo['username']); ?>">
              <?php if(isset($_SESSION['errors']['username'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['username'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="photo">Foto de perfil</label>
              <input type="file" name="photo" id="photo" class="form-control" placeholder="Apellidos" aria-describedby="helpId" value="<?php echo($contactInfo['last_name']); ?>">
            </div>
            <button type="submit" class="btn btn-success btn-block">Actualizar</button>
        </form>
    </section>
    <?php 
      include_once('../includes/footer.php'); 
    ?>
</body>
</html>