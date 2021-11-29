<nav class="navbar navbar-expand-lg navbar-custom-content">
    <a class="navbar-brand" href="../../index.php">
        <img src="../../Public/img/logo.png" width="30" height="30" class="d-inline-block image-logo align-top" alt="">
        CamanChat
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link navbar-link-custom" href="../landing/landing.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-link-custom" href="../landing/about.php">Sobre la applicacion</a>
            </li>
            <li class="nav-item">
                <?php if(isset($_SESSION['user'])){ ?>
                    <a class="nav-link" href="../../Controllers/User/UserController.php?a=logout">Salir</a>
                <?php }else{ ?>
                    <a class="nav-link" href="../login/login.php">Iniciar Session</a>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>