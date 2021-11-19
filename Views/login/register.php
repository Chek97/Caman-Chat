<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuevo Usuario | login</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    <section>
        <div>
            <a href="./login.php?">Regresar</a>
            <form action="../../Controllers/User/UserController.php?a=create" method="POST">
                <div class="form-group">
                    <input type="text" name="username" id="" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="" class="form-control" placeholder="Nombres" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" id="" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
                </div>
                <div>
                    <button type="submit">Crear Usuario</button>
                    <button type="reset">Vaciar Campos</button>
                </div>
            </form>
        </div>
    </section>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>