<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header('location: ../main/main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuevo Usuario | login</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    <section class="container">
        <div class="register-container">
            <?php require('../includes/session.php'); ?>
            <a href="./login.php?"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
            <hr>
            <header class="mb-3">
                <h1>Registrar Nuevo Usuario</h1>
            </header>
            <form action="../../Controllers/User/UserController.php?a=create" novalidate method="POST">
                <div class="form-group">
                    <input type="text" name="username" id="" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId">
                    <?php if(isset($_SESSION['errors']['username'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['username'] . "</small>") ?>
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="Nombres" aria-describedby="helpId">
                    <?php if(isset($_SESSION['errors']['name'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['name'] . "</small>") ?>
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" id="" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
                    <?php if(isset($_SESSION['errors']['lastName'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['lastName'] . "</small>") ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                    <?php if(isset($_SESSION['errors']['password'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['password'] . "</small>") ?>
                </div>
                <div class="pt-3 pb-3">
                    <button class="btn btn-secondary" type="submit">Crear Usuario</button>
                    <button class="btn btn-info" type="reset">Vaciar Campos</button>
                </div>
            </form>
        </div>
    </section>
    <!-- <?php include_once('../includes/footer.php'); ?> -->
</body>
</html>