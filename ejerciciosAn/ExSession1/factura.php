<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
</head>
<body>
	<h1>Factura</h1>
	<?php 
	session_start();
	$username = $_SESSION["usuario"];
	echo "Hola $username!!<br><br>";
	?>
	<form action="calculo.php" method="POST">
		Numero de horas: <input type="text" name="horas"/>
		<br/>
		Numero de horas extra: <input type="text" name="extra" />
		<br/>
		<input type="submit" value="Calcular">
	</form>
</body>
</html>