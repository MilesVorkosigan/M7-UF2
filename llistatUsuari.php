<?php
require_once ("./conexions/autoload.php");

$userDAO = new UserDAO('usuari', $con);
$llistaTreballadors = $userDAO->listTable('usuari');

?>

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
    <link rel="stylesheet" href="stylesCss/stylesTable.css" type="text/css" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>List Users</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Cognoms</th>
                    <th scope="col">Administrador</th>
                    <th scope="col">Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($llistaTreballadors as $trelladdor) { ?>
                    <tr class=<?php echo $trelladdor['admin'] == '0' ? "table-primary" : "table-warning"; ?>>
                        <th scope="row">
                            <?php echo $trelladdor['id'] ?>
                        </th>
                        <td>
                            <?php echo $trelladdor['name'] ?>
                        </td>
                        <td>
                            <?php echo $trelladdor['surname'] ?>
                        </td>
                        <td>
                            <?php echo $trelladdor['admin'] == '1' ? "Administrador" : "Comprador"; ?>
                        </td>
                        <td>
                            <a href="login.php" class="btn btn-outline-primary">Modificar</a>
                            <a href="login.php" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>