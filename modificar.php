<?php
require_once ("./conexions/autoload.php");
$userName = $sessUser->getCurrentUser();
echo $userName;
$nameChange = $userName;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['modificate'])) {
        $nameChange = $_POST['modificate'];


    } 


}

$accio = (isset($_POST['accio'])) ? $_POST['accio'] : "";
//dades del usuari per poder modificar
$bd = new DaoUser($con->getPdo());
$dadesUsuari = $bd->getUserbyName($nameChange);
$idUser = $bd->getIdByAlias($nameChange);
$txtNom = $dadesUsuari ? $dadesUsuari->getName() : "";
$txtCognoms = $dadesUsuari ? $dadesUsuari->getSurname() : "";
$txtEmail = $dadesUsuari ? $dadesUsuari->getEmail() : "";
$txtPass = $dadesUsuari ? $dadesUsuari->getPass() : "";
$txtTypeUser = $dadesUsuari->getAdm() == 1 ? "admin" : "comp";
$dadesModificades = false;


switch ($accio) {
    case 'btnAfegir':
        echo
            // $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $txtNomRegistre = (isset($_POST['txtNom'])) ? $_POST['txtNom'] : " no rebu";
        $txtCognomsRegistre = (isset($_POST['txtCognoms'])) ? $_POST['txtCognoms'] : "";
        $txtEmailRegistre = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
        $txtPassRegistre = (isset($_POST['txtPass'])) ? $_POST['txtPass'] : "";
        $txtTypeUserRegistre = (isset($_POST['typeUser'])) ? ($_POST['typeUser'] == "admin" ? 1 : 0) : 0;


        if (!empty($txtNom)) {
           
            $registre = new User($txtNomRegistre, $txtCognomsRegistre, $txtEmailRegistre, $txtTypeUserRegistre, $txtPassRegistre);

            $bd = new DaoUser($con->getPdo());
            $idUser=$bd->getIdByAlias($txtNomRegistre);
            $bd->update($registre, $idUser);
            $con->closeConnection();
            $dadesModificades = true;
        } else {
            echo 'Error tenim un error btnAfegir';
        }

        break;
    case 'btnEliminar':
        echo 'elimu';
        // $bd->delete($idUser);
        //$sessUser->closeSession();
        // header("Location: index.php");

        exit;
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
    <meta name="description" content="Treball Practica 2 M7" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--Favicon-->
    <link rel="icon" type="image/ico" href="imatges/favicon.ico" />
    <!--CSS-->
    <link rel="stylesheet" href="stylesCss/stylesFormulari.css" type="text/css" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Modificació dades</title>
</head>

<body>
    <div class="container">
        <div class="col-md-7 col-lg-8">
            <h2 class="mb-3">Administrador <?php echo $userName ?></>
            <h4 class="mb-3">Dades Usuari <?php echo $idUser ?></h4>
            <form action="" class="needs-validation" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" class="form-control" id="alias" placeholder="Nom Usuari" value="<?php
                        echo $txtNom ?>" name="txtNom" required readonly="readonly">
                        <div class="invalid-feedback">
                            Es necesari Nom.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" placeholder=" escriu Cognoms"
                            value="<?php echo $txtCognoms ?>" name="txtCognoms" required>
                        <div class="invalid-feedback">
                            Es necesari Cognoms.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control" id="email" value="<?php echo $txtEmail ?>"
                            name="txtEmail" required>
                        <div class="invalid-feedback">
                            Escriure vàlid forma de correu.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Contrasenya</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Solamente si la vols camviar" name="txtPass">
                    </div>
                    <div class="col-md-5" <?php $dadesUsuari->getAdm() == 'admin' ? "" : "hidden"; ?>>
                        <label for="admin" class="form-label">Tipus Usuari</label>
                        <select class="form-select" id="typeUser" name="typeUser" value="" required>
                            <option value="">Escull</option>
                            <option value="admin" <?php if ($txtTypeUser == 'admin') {
                                echo "selected";
                            } ?>>Administrador
                            </option>
                            <option value="comp" <?php if ($txtTypeUser != 'admin') {
                                echo "selected";
                            } ?>>Comprador</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecciona tipus usuari.
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="buttons">
                        <button class="btn btn-success btn-lg" type="submit" name="accio"
                            value="btnAfegir">Aceptar</button>
                        <a href="menuopcion.php" class="btn btn-secondary btn-lg">Cancelar</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal"
                            data-bs-target="#confirmar" value="btnEliminar" name="accio">
                            Eliminar
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmar" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar elimininació</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo $idUser . ".- " . $registre->getName() ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tancar</button>
                                    <button value="btnEliminar" type="submit" class="btn btn-primary"
                                        name="accio">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <?php
            if ($dadesModificades) {
                echo '<span class="badge text-bg-success rounded-pill">Modificat</span>';
            } ?>
        </div>
    </div>
</body>
<!--script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>