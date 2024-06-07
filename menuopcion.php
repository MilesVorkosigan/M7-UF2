<?php
require_once ("./conexions/autoload.php");


?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Miles" />
    <meta name="description" content="Treball Practica 2 M7" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--Favicon-->
    <link rel="icon" type="image/ico" href="imatges/favicon.ico" />
    <!--CSS-->
    <link rel="stylesheet" href="stylesCss/styleMenu.css" type="text/css" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>



<body>

    <div class="container d-grid gap-2 col-6 mx-auto">

        <h2>Benvingut <?php echo $sessUser->getCurrentUser(); ?></h2>
        <form method="POST" action="modificar.php" class="btn btn-primary btn-lg">
            <input type="hidden" name="modificate" value="<?php echo $sessUser->getCurrentUser(); ?>">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Dades Propies</button>
        </form>
        <a href="llistatUsuari.php" class="btn btn-primary btn-lg">Llista Usuaris</a>
        <a href="M_5Aplicacio.php" class="btn btn-primary btn-lg">Comprar</a>
        <a href="M_5Logout.php" class="btn btn-primary btn-lg">Sortir</a>
    </div>

</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>