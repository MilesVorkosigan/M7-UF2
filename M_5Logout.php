<?php
        //Tanquem sessió
	session_start();
	session_destroy();
	$_SESSION=array(); //És el mateix què unset($_SESSION) o session_unset()
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Tancar Sessió</title>
</head>
    <body>
        <h3>Sessió finalitzada</h3>
        <a href="index.php">Tornar a l'inici</a>
    </body>
</html>