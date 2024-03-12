<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Miles" />
    <meta name="description" content="Treball Practica 1 M7" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--Favicon-->
    <link rel="icon" type="image/ico" href="imatges/favicon.ico" />
    <!--CSS-->
    <link rel="stylesheet" href="stylesCss/styles.css" type="text/css" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Inici</title>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

            <label for="">Nom :</label>
            <input type="text" name="txtNom" placeholder="" id="txtNom" require="">
            <br>
            <label for="">Cognoms:</label>
            <input type="text" name="txtCognoms" placeholder="" id="txtcognoms" require="">
            <br>
            <label for="">Correu :</label>
            <input type="text" name="txtEmail" placeholder="" id="txtEmail" require="">
            <br><label for="">Constrasenya :</label>
            <input type="password" name="txtPass" placeholder="" id="txtPass" require="">
            <br>

            <button value="btnAfegir" type="submit" name="accio">Aceptar</button>
            <button value="btnCancelar" type="submit" name="accio">Cancelar</button>

        </form>

    </div>

</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>