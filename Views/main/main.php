<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php 
        require_once('../../Controllers/User/UserController.php'); 
        include('../../Helpers/sessionStatus.php');
        isLoggin();
        include_once('../includes/navbar.php');
    ?>
    <div class="main-content">
        <aside class="main-aside">
            <div class="main-aside--header">
                <h2>CONTACTOS</h2>
            </div>
            <div class="main-aside--content">
                <?php
                    require_once('./contactsList.php');
                ?>
            </div>
        </aside>
        <section class="main-conversations">
            Conversaciones pendientes
        </section>
        <!-- Ajustar el tamaño con grid css -->
        <header class="main-header">
            <p>
                Bienvenido Usuario <strong><?php echo($_SESSION['user']['username'])?></strong> <a href="#">Editar</a>
            </p>
        </header>
    </div>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>