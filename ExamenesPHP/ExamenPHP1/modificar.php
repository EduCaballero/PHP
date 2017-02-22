<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Modificar Contraseña</h1>
	<form action="" method="POST">
		<label for="pass"> Contraseña actual:</label>
		<input type="Password" name="pass" id="pass"><br/>
		<label for="newpass">Nueva contraseña:</label>
		<input type="Password" name="newpass" id="newpass"><br/>
		<label for="newpass2">Confirma contraseña</label>
		<input type="Password" name="newpass2" id="newpass2"><br/>
		<input type="submit" value="Enviar">
	</form>

	<?php 
	session_start();
	if (isset($_POST["pass"])) {
		if ($_SESSION["password"]==$_POST["pass"]) {
			if ($_POST["newpass"]==$_POST["newpass2"]) {
				if ($_POST["pass"]!=$_POST["newpass"]) {
					$_SESSION["password"]=$_POST["newpass"];
					echo "Contraseña modificada<br>";
				}
				else echo "La nueva contraseña ha de ser diferente de la contraseña actual<br>";
			}
			else echo "Verificacion de nueva contraseña incorrecta<br>";
		}
		else echo "Contraseña actual incorrecta<br>";
	}
	?>
</body>
</html>