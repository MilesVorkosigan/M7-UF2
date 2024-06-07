<?php
require_once "conexions/autoload.php";


if (isset($_SESSION['user_id'])) {
    //cas que tenim session oberta
    header('Location: menuopcion.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo ('aceptar');
    if (!empty($_POST['usuari']) && !empty($_POST['password'])) {
        //validació de les dadess
        echo ('dades');
        $usuari = $_POST['usuari'];
        $password = $_POST['password'];
        if (verificacioCredencials($usuari, $password, $con)) {
            $sessUser->setCurrentUser($usuari);    
            header('Location: menuopcion.php');
            exit();
        } else {

            //Si l'autenticació no és correcte...
            echo '<h4>Dades No Correctes</h4>';

            header("location: index.php"); //Retornem a la pàgina inicial.
            exit();
        }

    }
}



function verificacioCredencials($usuari, $password, $con)
{

    $bd = new DaoUser($con->getPdo());
    //Contrasenya guardada per poder comparar
    $storedHash = $bd->getPasswordByAlias($usuari);

    // Hashear la contrasenya proporcionada por el usuari
    $providedHash = hash('sha256', $password);

    // Comparar los hashes para verificar si son iguals
    return $storedHash === $providedHash;
}
?>