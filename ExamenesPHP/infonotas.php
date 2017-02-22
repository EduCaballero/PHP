<?php

$asignaturas = array($_POST['nombre1'], $_POST['nombre2'], $_POST['nombre3'], $_POST['nombre4']);
$notas = array($_POST['nota1'], $_POST['nota2'], $_POST['nota3'], $_POST['nota4']);

$maxNota=$notas[0];
$maxPos=0;
$notatoal=0;

foreach ($notas as $pos => $valor){
    $notatoal+=$valor;
	if ($maxNota<$valor) {
		$maxNota=$valor;
		$maxPos=$pos;
	}
}

echo "La nota máxima que has sacado es en " .$asignaturas[$maxPos]. " con un $maxNota<br>"; 
echo "La nota media es de " .($notatoal/4);
?>