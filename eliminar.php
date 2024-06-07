<?php
require_once ("./conexions/autoload.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['erase'];
    $daoUser = new DaoUser($con->getPdo());
    
    $id=$daoUser->getIdByAlias($name);
    $success = $daoUser->delete($id);
    header("Location: llistatUsuari.php?");
 
} ?>