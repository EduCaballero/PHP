<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculo</title>
</head>
<body>
	<?php 
	session_start();
	echo "Importe por horas: ".($_POST['horas']*25). " EUR<br>";
	echo "Importe por horas extra: ".($_POST['extra']*40). " EUR<br>";
	echo "Importe total: ".($_POST['horas']*25+$_POST['extra']*40). " EUR<br>";
	?>
	<a href="fin.php"> Cerrar session</a>
</body>
</html>