<?php

require 'conexion.php';

$message = '';

if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
    $sql = "INSERT INTO (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Creat nou usuari';
    } else {
        $message = 'Ho sentim no podem crear la teva compte';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Miles" />
    <meta name="description" content="Treball Practica 2 M7" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--Favicon-->
    <link rel="icon" type="image/ico" href="imatges/favicon.ico" />
    <!--CSS-->
    <link rel="stylesheet" href="stylesCss/styles.css" type="text/css" />
    <title> SignUp</title>
</head>

<body>





    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
        <input name="usuari" type="text" placeholder="Nom usuari">
        <input name="contrasenya" type="password" placeholder="La teva contrasenya">
        <input name="confirm_password" type="password" placeholder="Confrima la contrasenya">
        <input type="submit" value="Submit">
    </form>

</body>

</html>