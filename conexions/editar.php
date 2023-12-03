<?php 

	require_once "conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();
	$id=$_GET['id'];
	$sql="SELECT nom
			from t_persona where id='$id'";
	$result=mysqli_query($conexion,$sql);
	$ver=mysqli_fetch_row($result);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form action="procesos/actualizar.php" method="post">
	<input type="text" hidden="" value="<?php echo $id ?>" name="id">
	<label>Nom</label>
	<p></p>
	<input type="text" name="txtnombre" value="<?php echo $ver[0] ?>">
	<p></p>
	<label>Constrasenya</label>
	<p></p>
	<input type="password" name="txtpass" value="<?php echo $ver[1] ?>">
	<p></p>
	<button>Afegir</button>
</form>
</body>
</html>