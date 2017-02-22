<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
	session_start();
	$edad=$_SESSION["edad"];
	echo "Hola ".$_SESSION["usuario"]."!!<br>";
	echo "tienes $edad años!<br>";
	$edad*=12;
	echo "tienes $edad meses!<br>";
	$edad*=30;
	echo "tienes $edad dias!<br>";
	$edad*=24;
	echo "tienes $edad horas!<br>";
	$edad*=60;
	echo "tienes $edad minutos!<br>";
	$edad*=60;
	echo "tienes $edad segundos!<br>";
	 ?>
	 <a href="fin.php"> Cerrar session</a>
</body>
</html>