<?php
//iniciem sessió
require_once ("./conexions/autoload.php");
$supermercat = array(
    array(
        "Id" => 1,
        "nom" => "Poma",
        "preu" => 1.99,
        "unitat" => 0
    ),
    array(
        "Id" => 2,
        "nom" => "Pera",
        "preu" => 0.99,
        "unitat" => 0
    ),
    array(
        "Id" => 3,
        "nom" => "Raim",
        "preu" => 3.99,
        "unitat" => 0
    ),
    array(
        "Id" => 4,
        "nom" => "Patates",
        "preu" => 1.99,
        "unitat" => 0
    ),
    array(
        "Id" => 5,
        "nom" => "Tomaquet",
        "preu" => 1.99,
        "unitat" => 0
    ),
);
$total = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Aplicació</title>
</head>

<body>
    <p>Benvingut/da <strong><?php echo $sessUser->getCurrentUser() ?></strong></p>
    <?php
    //cas que tinguem cookies
    if (isset($_COOKIE['usuari']) || isset($_COOKIE['contrasenya'])) {
        echo ('<p> <a href="M_5BorrarCookies.php">Borrar Galetes</a></p>');
        echo ('<p><a href="M_5EliminarCompra">Eliminar Compra</a><</p>');
    } else {
        echo ('<p><a href="index.php">Tornar Inici</a></p>');
        echo ('<h4>Has entrar sense Galetes</h4>');
    }
    //editar taula de productes

    ?>
    <form method="POST" action="M_5Comprar.php">
        <table border="1">
            <tr>
                <th colspan="4">
                    Supermercat
                </th>

            </tr>
            <tr>
                <th>Codi Producte</th>
                <th>Descripció</th>
                <th>-PREU-</th>
                <th>Quilograms</th>
            </tr>
            <?php foreach ($supermercat as $key => $dadesCompra) {
                $quantitat = isset($_SESSION[$dadesCompra['nom']]) ? $_SESSION[$dadesCompra['nom']] : 0;
                echo "<tr><td>" . $dadesCompra["Id"] . "</td><td>" . $dadesCompra["nom"] . "</td><td>" . $dadesCompra["preu"]
                    . ' €</td><td> <input type="number" name="quantitat'.$dadesCompra['Id'].'" value='
                    . strval($quantitat) . ' min="0" max="10" /></td>';
                $total += $dadesCompra["preu"] * $quantitat;
            }
            ?>
        </table>
        <h3>Total compra: <?php echo ($total) ?></h3>
        <input type="submit"  value="Enviar" />
    </form>
    <p><a href="M_5Logout.php">Tanca la sessió</a></p>
</body>

</html>