<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php
        session_start(); 
        include_once('../../Helpers/sessionStatus.php');
        isLoggin();
        include('../includes/navbar.php'); 
    ?>
    <header>
        <h1>Inicio</h1>
    </header>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>