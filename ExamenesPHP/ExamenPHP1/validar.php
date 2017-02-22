<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Bienvenido!</h1>
	<?php 
	session_start();
	$_SESSION["usuario"] = $_POST["username"];
	$_SESSION["password"] = $_POST["pass"];

	echo "Hola, ".$_SESSION["usuario"]."!<br>";
	?>
	<form action="modificar.php" method="POST">
		<input type="submit" value="Modificar Contraseña">
	</form>
	
</body>
</html>