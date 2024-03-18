

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
	<label>preu</label>
	<p></p>
	<input type="number" name="preu" value="<?php echo $ver[1] ?>">
	<p></p>
	<button>Agregar</button>
</form>
</body>
</html>