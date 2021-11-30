<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Caman-Chat</title>
    <?php include_once('../includes/header.php'); ?>
</head>
<body>
    <?php
        session_start(); 
        include('../includes/navbar.php'); 
    ?>
    <header>
        <section>
            <h1>CAMAN CHAT</h1>
            <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
               Odit voluptatibus voluptatem veniam architecto sint, 
               omnis repudiandae quos ipsam aliquid provident 
               perferendis quia nesciunt reprehenderit iure explicabo, 
               porro ducimus ut nihil.
            </p>
            <div style="text-align: center;">
                <button class="button-landing btn">Empieza Ya</button>
            </div>
        </section>
        <div class="image-one-container">
            <img src="../../Public/img/Background_1.jpg" alt="imagen1">
        </div>
    </header>
    <section class="landing-comments">
        <article class="landing-comments__article">
            <img src="../../Public/img/profile-user.png" class="img img-thumbnail" width="150" height="150" alt="usuario 1"> 
            <div class="landing-comments__article--info">
                <blackquote>"Usuario 1"</blackquote>
                <p>
                    <strong>Edward Snowden</strong>
                    <br>
                    Informante y activista en privacidad
                </p>
            </div>
        </article>
        <article class="landing-comments__article">
            <img src="../../Public/img/profile-user.png" class="img img-thumbnail" width="150" height="150" alt="usuario 2">
            <div class="landing-comments__article--info">
                <blackquote>"Usuario 1"</blackquote>
                <p>
                    <strong>Edward Snowden</strong>
                    <br>
                    Informante y activista en privacidad
                </p>
            </div>
        </article>
        <article class="landing-comments__article">
            <img src="../../Public/img/profile-user.png" class="img img-thumbnail" width="150" height="150" alt="usuario 3">
            <div class="landing-comments__article--info">
                <blackquote>"Usuario 1"</blackquote>
                <p>
                    <strong>Edward Snowden</strong>
                    <br>
                    Informante y activista en privacidad
                </p>
            </div>
        </article>
        <article class="landing-comments__article">
            <img src="../../Public/img/profile-user.png" class="img img-thumbnail" width="150" height="150" alt="usuario 4">
            <div class="landing-comments__article--info">
                <blackquote>"Usuario 1"</blackquote>
                <p>
                    <strong>Edward Snowden</strong>
                    <br>
                    Informante y activista en privacidad
                </p>
            </div>
        </article>
    </section>
    <section class="landing-info-page">
        <article>
            <h2>¿Porque usar caman-chat?</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quo, dolores neque. Explicabo fugit aut unde, ipsa quibusdam veniam eum esse exercitationem porro, 
                consectetur minus distinctio. Quam dolores et officia fugit.
            </p>
        </article>
        <img src="../../Public/img/Background_2.png" class="img img-thumbnail" width="800" height="500" alt="imagen 2">
        <article>
            <h2>Comparte sin inseguridades</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Temporibus quis molestiae perspiciatis exercitationem consectetur corporis, 
                eum quas nobis mollitia itaque laboriosam aspernatur placeat facilis delectus ipsum 
                inventore facere incidunt excepturi?
            </p>
        </article>
    </section>
    <?php include_once('../includes/footer.php'); ?>
</body>
</html>