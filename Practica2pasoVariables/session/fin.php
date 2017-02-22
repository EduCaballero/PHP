<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fin</title>
</head>
<body>
	<?php 
	session_start();
	echo "Hasta la proxima ".$_SESSION["usuario"]."!<br>";
	session_destroy();
	?>
</body>
</html>