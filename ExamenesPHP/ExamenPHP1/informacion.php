<?php 
$heroes = array("Sr. Fantastico", "Mujer Invisible", "Antorcha Humana", "La Cosa");
$malos = array($_POST['malos1'], $_POST['malos2'], $_POST['malos3'], $_POST['malos4']);

$maxMalos=$malos[0];
$maxPos=0;
foreach ($malos as $pos => $vencidos) {
	if ($maxMalos<$vencidos) {
		$maxMalos=$vencidos;
		$maxPos=$pos;
	}
}

echo "El heroe que mas malos ha vendico es ".$heroes[$maxPos]." con $maxMalos malos vencidos<br>"; 

?>