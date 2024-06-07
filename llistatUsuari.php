<?php
require_once ("./conexions/autoload.php");
$userName = $sessUser->getCurrentUser();
$daoUser = new DaoUser($con->getPdo());
$buyers = $daoUser->getAllUsers();
$user = $daoUser->getUserbyName($userName);

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
    <h2>Benvingut usuari <?php echo $userName ?></h2>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Administrador</th>
                    <th scope="col">Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($buyers as $buyer) { ?>
                    <tr class=<?php echo $buyer->getAdm() == '0' ? "table-primary" : "table-warning"; ?>>
                        <th scope="row">
                            <?php echo $buyer->getId() ?>
                        </th>
                        <td>
                            <?php echo $buyer->getName() ?>
                        </td>
                        <td>
                            <?php echo $buyer->getSurname() ?>
                        </td>
                        <td>
                            <?php echo $buyer->getAdm() == '1' ? "Administrador" : "Comprador"; ?>
                        </td>
                        <td>
                            <div <?php echo $user->getAdm() == '0' ? "hidden" : ""; ?>>
                                <form method="POST" action="modificar.php" style="display: inline;">
                                    <input type="hidden" name="modificate" value="<?php echo $buyer->getName(); ?>">
                                    <button type="submit" class="btn btn-outline-primary">Modificar</button>
                                </form>
                                <form method="POST" action="eliminar.php" style="display: inline;">
                                    <input type="hidden" name="erase" value="<?php echo $buyer->getName(); ?>">
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="menuopcion.php" class="btn btn-outline-primary">Tornar</a>
    </div>
</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>