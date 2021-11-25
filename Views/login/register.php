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
            <a href="./login.php?">Regresar</a>
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