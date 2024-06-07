<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Miles" />
    <meta name="description" content="Treball Practica 2 M7" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- Favicon -->
    <link rel="icon" type="image/ico" href="imatges/favicon.ico" />
    <!-- CSS -->
    <link rel="stylesheet" href="stylesCss/styles.css" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold mb-0 fs-2">Acess Usuari</h1>
                        <a href="index.php" class="btn-close" aria-label="Close"></a>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <form class="login" method="POST" action="controlador.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="usuari" name="usuari" placeholder="Nom Usuari" required>
                                <label for="usuari">Nom Usuari</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Aceptar</button>
                            <div class="checkbox">
                                <input type="checkbox" name="saveCookies" id="saveCookies" switch>
                                <label for="saveCookies">Guardar contrasenya</label>
                            </div>
                            <small class="text-body-secondary">Aceptar els termes us.</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
