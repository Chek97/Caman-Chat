<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Contacto</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php 
        require_once('../../Controllers/Contacts/ContactsController.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
        include_once('../includes/navbar.php');

        $contactInfo = $insController->getContact($_GET['id']);
    ?>
    <section class="login-container"> 
        <?php require('../includes/session.php'); ?>
        <header>
            <h1>Editar Contacto</h1>
        </header>
        <form action="../../Controllers/Contacts/ContactsController.php?a=edit" method="POST">
            <input type="hidden" name="contact_id" value="<?php echo($contactInfo['id']); ?>">
            <div class="form-group">
              <label for="name">Nombres</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" aria-describedby="helpId" value="<?php echo($contactInfo['name']); ?>">
              <?php if(isset($_SESSION['errors']['name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['name'] . "</small>") ?>
            </div>
            <div class="form-group">
              <label for="last_name">Apellidos</label>
              <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellidos" aria-describedby="helpId" value="<?php echo($contactInfo['last_name']); ?>">
              <?php if(isset($_SESSION['errors']['last_name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['last_name'] . "</small>") ?>
            </div>
            <button type="submit" class="btn btn-success btn-block">Actualizar</button>
        </form>
    </section>
    <?php 
      include_once('../includes/footer.php'); 
    ?>
</body>
</html>