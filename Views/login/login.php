<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header('location: ../main/main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar Session | login</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    <section class="container">
        <div class="login-container">
            <header>
                <h1>Iniciar Session</h1>
            </header>
            <hr>
            <?php require('../includes/session.php'); ?>
            <form action="../../Controllers/User/UserController.php?a=validate" method="POST">
                <div class="form-group">
                  <label for="">Usuario</label>
                  <input type="text" name="username" id="" class="form-control" placeholder="Ej: user555" aria-describedby="helpId">
                  <?php if(isset($_SESSION['errors']['username'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['username'] . "</small>") ?>
                </div>
                <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="password" name="password" id="" class="form-control" aria-describedby="helpId">
                  <?php if(isset($_SESSION['errors']['password'])) echo("<small id='helpId' class='text-danger'>". $_SESSION['errors']['password'] . "</small>") ?>
                </div>
                <div class="mb-3">
                    <button class="btn btn-secondary" type="submit">Sign In</button>
                </div>
            </form>
            <div class="pt-3 register-link">
                ¿Aun no tienes una cuenta? crea una <a href="./register.php">ahora</a>
            </div>
        </div>
    </section>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>