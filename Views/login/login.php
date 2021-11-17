<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar Session | login</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php include_once('../includes/navbar.php'); ?>
    <section>
        <div>
            <header>
                <h1>Iniciar Session</h1>
            </header>
            <hr>
            <form action="#" method="POST">
                <div class="form-group">
                  <label for="">Usuario</label>
                  <input type="text" name="" id="" class="form-control" placeholder="Ej: user555" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="password" name="" id="" class="form-control" aria-describedby="helpId">
                </div>
                <div>
                    <button type="submit">Sign In</button>
                </div>
            </form>
            <div>
                ¿Aun no tienes una cuenta? crea una <a href="./register.php">ahora</a>
            </div>
        </div>
    </section>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>