<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
	session_start();
	echo "Hola ".$_SESSION["usuario"]."!!<br>";
	 ?>
	 <form action="datos.php" method="POST">
	 Edades: <br/>
	 	Edad 1: <input type="number" name="edad1"><br/>
	 	Edad 1: <input type="number" name="edad2"><br/>
	 	Edad 1: <input type="number" name="edad3"><br/>
	 	Edad 1: <input type="number" name="edad4"><br/>
	 	Edad 1: <input type="number" name="edad5"><br/><br/>
	 	Pesos: <br/>
	 	Peso 1: <input type="number" name="peso1"><br/>
	 	Peso 2: <input type="number" name="peso2"><br/>
	 	Peso 3: <input type="number" name="peso3"><br/>
	 	Peso 4: <input type="number" name="peso4"><br/>
	 	Peso 5: <input type="number" name="peso5"><br/><br/>
	 	<input type="submit" value="Enviar">
	 </form>
</body>
</html>