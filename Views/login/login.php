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
            <?php
                session_start(); 
                if(isset($_SESSION['errors']) && isset($_SESSION['message'])){
                    echo("<div class='alert alert-" . $_SESSION['status'] ." alert-dismissible fade show' role='alert'>
                            <p>" . $_SESSION['message'] . "</p>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>"
                        );
                }else if(isset($_SESSION['status']) && isset($_SESSION['message'])){
                    echo("<div class='alert alert-" . $_SESSION['status'] ." alert-dismissible fade show' role='alert'>
                            <p>" . $_SESSION['message'] . "</p>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>"
                    );
                }
                session_destroy();
            ?>
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