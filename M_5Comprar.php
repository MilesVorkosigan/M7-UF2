<?php
session_start();
$total = 0.0;
$subtotal = 0.0;
$supermercat = $_SESSION['productes'];
$llistatCompra = [];


foreach ($supermercat as $compra) {
    $idProducte = $compra['Id'];
    $idquantitat = 'quantitat' . $idProducte;
    $numUnitats = isset($_POST[$idquantitat]) ? $_POST[$idquantitat] : "";

    if (isset($_POST[$idquantitat]) && ($_POST[$idquantitat] > 0)) {

        setcookie($compra['nom'], $numUnitats, [
            'expires' => time() + (86400 * 30), // Caducidad de 30 días
            'path' => '/'
        ]);
        //Creem les linees de informació les quals tenim 
        $subtotal = $numUnitats * $compra['preu'];
        $text = 'Tenim ' . $compra["nom"] . ' hem comprat ' . $_COOKIE[$compra["nom"]] . ' ens costarà ' . $subtotal . ' €';
        array_push($llistatCompra, $text);
        $total += $subtotal;
    } else {
        //eliminar cookies que 
        if (isset($_COOKIE[$compra['nom']])) {
            setcookie($compra["nom"], "", time() - 3600, '/'); //borrar la cookie
        }
    }
    //Hem separat session i cookie per buscar millor els errors de la logica he tingut
    if (isset($_POST[$idquantitat]) && ($_POST[$idquantitat] > 0)) {
        $_SESSION[$compra['nom']] = $numUnitats;
    } else {
        unset($_SESSION[$compra['nom']]);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Llista Productes</title>
</head>

<body>
    <h1>Cistella de la compra</h1>
    <ul class="shop">
        <?php
        if (count($llistatCompra) == 0) {
            echo '<li> No has fet compres</li>';
        } else {
           foreach($llistatCompra as $comprat){
            echo'<li>'.$comprat.'</li>';
           } 
        }
        echo ('<li> Total compra : ' . $total . '€ </li>');

        ?>
    </ul>
    <p><a href="M_5Aplicacio.php">Tornar a la Botiga</a></p>


</body>

</html>