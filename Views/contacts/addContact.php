<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agregar Nuevo Contacto</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php 
        require_once('../../Controllers/User/UserController.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
        include_once('../includes/navbar.php');
    ?>
    <a href="../main/main.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <section class="login-container"> 
        <?php require('../includes/session.php'); ?>
        <header>
            <h1>Nuevo Contacto</h1>
        </header>
        <form action="../../Controllers/Contacts/ContactsController.php?a=add" method="POST">
            <input type="hidden" name="user_id" value="<?php echo($_SESSION['user']['id']); ?>">
            <div class="form-group">
              <label for="name">Nombres</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" aria-describedby="helpId">
              <?php if(isset($_SESSION['errors']['name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['name'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="last_name">Apellidos</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
              <?php if(isset($_SESSION['errors']['last_name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['last_name'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="username">Usuario</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId">
              <?php if(isset($_SESSION['errors']['username'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['username'] . "</small>") ?>
            </div>
            <button type="submit" class="btn btn-secondary btn-block">Agregar</button>
        </form>
    </section>
    <?php 
      include_once('../includes/footer.php'); 
    ?>
</body>
</html>