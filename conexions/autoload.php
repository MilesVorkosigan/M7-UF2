<?php
//farem servir autoload per crear accès a la base de dades
//i enllaçar les classes que podem necessitar
require_once "conexion.php";
require_once "./classes/User.php";
require_once "./classes/DaoUser.php";
require_once "./classes/userSession.php";
// require_once "./classes/GenericDAO.php";
// require_once "./classes/UserDAO.php";
// require_once "./classes/DAO.php";
//activar la conexio a la base de dades
$con = new Conexion();
//farem que cada pagina inciar la sessio
$sessUser= new UserSession();

spl_autoload_register(function ($class_name) {
    $directories = array(
        'classes/',
        'interfaces/'
    );

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

?>