 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Datos</title>
 </head>
 <body>
 	<?php 
 	session_start();
 	$_SESSION["edad"];
 	$edades = array($_POST['edad1'], $_POST['edad2'], $_POST['edad3'], $_POST['edad4'], $_POST['edad5']);
 	$pesos = array($_POST['peso1'], $_POST['peso2'], $_POST['peso3'], $_POST['peso4'], $_POST['peso5']);

 	$sumEdad=0;
 	$mayorEdad=0;
 	foreach ($edades as $aedad) {
 		if ($aedad>=18) $mayorEdad++;
 		echo "$aedad<br>";
 		$sumEdad+=$aedad;
 	}
 	echo "Media de las edades: ".($sumEdad/5)."<br>";
 	echo "Mayores de edad: $mayorEdad <br>";

 	$sumPeso=0;
 	foreach ($pesos as $apesos) {
 		echo "$apesos<br>";
 		$sumPeso+=$apesos;
 	}
 	echo "Media de los pesos: ".($sumPeso/5)."<br>";

 	$sumEdad+=$_SESSION["edad"];
 	echo "Media de las edades con la del usuario validado incluida: ".($sumEdad/6)."<br>";
 	?>
 	<a href="fin.php"> Cerrar session</a>
 </body>
 </html>