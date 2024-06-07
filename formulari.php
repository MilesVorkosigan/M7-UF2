<?php
require_once ("./conexions/autoload.php");


$accio = (isset($_POST['accio'])) ? $_POST['accio'] : "";

switch ($accio) {
  case 'btnAfegir':
    // $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $txtNom = (isset($_POST['txtNom'])) ? $_POST['txtNom'] : " no rebu";
    $txtCognoms = (isset($_POST['txtCognoms'])) ? $_POST['txtCognoms'] : "";
    $txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
    $txtPass = (isset($_POST['txtPass'])) ? $_POST['txtPass'] : "";
    $txtTypeUser = (isset($_POST['typeUser'])) ? ($_POST['typeUser'] == "admin" ? 1 : 0) : 0;


    if (!empty($txtNom)) {
      $registre = new User($txtNom, $txtCognoms, $txtEmail, $txtTypeUser, $txtPass);
      $bd = new DaoUser($con->getPdo());
      //$data=$registre->getData();
      $bd->create($registre);
      $con->closeConnection();
    } else {
      echo 'Error tenim un error btnAfegir';
    }

    // header("Location: login.php");
    // exit;
    break;
  case 'btnEliminar':
    header("Location: login.php");
    echo "de";
    break;
  case 'btnCancelar':
    header('Location : index.php');
    break;
  default:
    # code...
    echo 'default';
    break;
}

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
  <link rel="stylesheet" href="stylesCss/stylesFormulari.css" type="text/css" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Formulari</title>
</head>

<body>
  <div class="container">
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Dades Usuari</h4>
      <form action="" class="needs-validation" method="post">
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="alias" class="form-label">Alias</label>
            <input type="text" class="form-control" id="alias" placeholder="Nom Usuari" value="" name="txtNom" required>
            <div class="invalid-feedback">
              Es necesari Nom.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" placeholder=" escriu Cognoms" value="" name="txtCognoms"
              required>
            <div class="invalid-feedback">
              Es necesari Cognoms.
            </div>
          </div>

          <div class="col-12">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="" name="txtEmail"
              required>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="col-12">
            <label for="password" class="form-label">Contrasenya</label>
            <input type="password" class="form-control" id="password" placeholder="" name="txtPass" required>
            <div class="invalid-feedback">
              Please enter your password.
            </div>
          </div>
          <div class="col-md-5">
            <label for="admin" class="form-label">Tipus Usuari</label>
            <select class="form-select" id="typeUser" name="typeUser" value="" required>
              <option value="">Escull</option>
              <option value="admin">Administrador</option>
              <option value="comp">Comprador</option>
            </select>
            <div class="invalid-feedback">
              Please select type user.
            </div>
          </div>
          <hr class="my-4">

          <div class="buttons">
            <button class="btn btn-success btn-lg" type="submit" name="accio" value="btnAfegir">Aceptar</button>
            <a href="index.php" class="btn btn-secondary btn-lg">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>