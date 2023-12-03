<?php
require_once "conexions/conexion.php";
session_start();
define("USUARI", "admin"); //Definim nom d'usuari vàlid
define("PASSWORD", "admin"); //Definim contrsenya vàlida

if (isset($_COOKIE["usuari"]) && isset($_COOKIE["contrasenya"])) {
 
  
  $_SESSION["ultimAcces"] = time();
  $_SESSION["usuari"] = $_COOKIE["usuari"];
  $_SESSION["contrasenya"] = $_COOKIE["contrasenya"];
  
  header("Location: M_5Aplicacio.php");
} else {
  if (!isset($_COOKIE["usuari"]) || !isset($_COOKIE["contrasenya"])) {
    //mostrara el formulari
  } else {
    // Credentials incorrectes borrarem les cookies
    setcookie("usuari", "");
    setcookie("contrasenya", "");
    //farem aquest seguiment per evitar bucle.
    if (!isset($_SESSION["redireccionada"])) {
      $_SESSION["redireccionada"] = true;
      header("Location: index.php");
    } else {
      echo "Credencials incorrectes";
    }
  }
}
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
    <link rel="stylesheet" href="stylesCss/styles.css" type="text/css" />
    <title>Login</title>
</head>

<body>
  <div class="container">
    <form method="POST" action="M_5autenticacio.php">
      <label for="usuari">Usuari: </label><input type="text" name="usuari" id="usuari" /><br /><br />
      <label for="contrasenya">Contrasenya: </label><input type="password" name="contrasenya" id="contrasenya" />

      <input type="submit" name="enviar" value="Accedir" />
      <div class="checkbox">
        <input type="checkbox" name="saveCookies" id="saveCookies" />
        <label for="saveCookies">Guardar constrasenya</label>
      </div>
    </form>
  </div>
</body>

</html>