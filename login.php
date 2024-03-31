<?php
require_once "conexions/autoload.php";
session_start();
if (isset($_SESSION['user_id'])) {
  //cas que tenim session oberta
  header('Location: M5_aplicacio.php');
}elseif (!empty($_POST['email']) && !empty($_POST['password'])) {
  //cas que hagi omplert les dades
}else{
  //cas que tingui buit alguna part del formulari necesari
}

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
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <!-- <form method="POST" action="M_5autenticacio.php">
      <label for="usuari">Usuari: </label><input type="text" name="usuari" id="usuari" /><br /><br />
      <label for="contrasenya">Contrasenya: </label><input type="password" name="contrasenya" id="contrasenya" />

      <input type="submit" name="enviar" value="Accedir" />

    </form>
  </div> -->
  <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2">Acess Usuari</h1>
          <a href="index.php" class="btn-close" aria-label="Close"></a>
        </div>

        <div class="modal-body p-5 pt-0">
          <form class="login"method="POST" action="M_5autenticacio.php">
            <div class="form-floating mb-3">
              <input type="name" class="form-control rounded-3" id="usuari" placeholder="Nom Usuari">
              <label for="usuari">Nom Usuari</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Aceptar</button>
            <div class="checkbox">
              <input type="checkbox" name="saveCookies" id="saveCookies" switch>
              <label for="saveCookies">Guardar constrasenya</label>
            </div>
            <small class="text-body-secondary">Aceptar els termes us.</small>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>