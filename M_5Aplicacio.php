<?php
//iniciem sessió
session_start();
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

define("TEMPSINACTIU", 200); //Segons màxims que pot estar l'aplicació inactiva



//Temps transcorregut des de l'últim accés a la pàgina i la data actual.
$tempsTranscorregut = time() - $_SESSION["ultimAcces"];


if ($tempsTranscorregut >= TEMPSINACTIU) { //Si la sessió ha caducat, han passat 30 segons o més des de l'últim accés...
    session_destroy(); //Destruim sessió
    header("Location: M_5Caducitat.php"); //Mostrem la pàgina de caducitat
} else { //Si no ha caducat...
    $_SESSION["ultimAcces"] = time(); //Actualitzem la data per tornar a començar
    $_SESSION['productes'] = $supermercat;

    //comprovem si tenim cookies de la compra
    foreach ($supermercat as $key => $dadesCompra) {

        if (isset($_COOKIE[$dadesCompra['nom']])) {
            print_r("Entrema cookies");
            $_SESSION[$dadesCompra['nom']] = $_COOKIE[$dadesCompra['nom']];
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Aplicació</title>
</head>

<body>
    <p>Benvingut/da <strong><?php echo $_SESSION["usuari"]; ?></strong></p>
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