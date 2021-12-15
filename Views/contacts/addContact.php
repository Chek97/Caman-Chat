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
    <section class="container"> 
        <header>
            <h1>Nuevo Contacto</h1>
        </header>
        <form action="../../Controllers/Contacts/ContactsController.php?a=add" method="POST">
            <input type="hidden" name="user_id" value="<?php echo($_SESSION['user']['id']); ?>">
            <div class="form-group">
              <label for="name">Nombres</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="last_name">Apellidos</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="username">Usuario</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId">
            </div>
            <button type="submit" class="btn btn-secondary btn-block">Agregar</button>
        </form>
    </section>
</body>
</html>