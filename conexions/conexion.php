<?php 
$servidor = "mysql::dbname=supermecat;host=127.0.0.1";
$usuari="root";
$pass ="rootpass";

try {
	$pdo = new PDO($servidor,$usuari,$pass);
	echo "Connectat..";

} catch (PDOException $e) {
	echo "No conectar : ( ".$e->getMessage();
}

?>