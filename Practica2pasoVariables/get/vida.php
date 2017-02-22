<?php

$anyos = $_GET['any1'] - $_GET['any2'];

echo "Tienes " . $anyos . " años";
echo "<br>";

if ($anyos>1) {
    $meses = $anyos*12;
    echo "El equivalente en meses es de " . $meses;
    echo "<br>";
    
    $dias = $anyos*365;
    echo "El equivalente en días es de " . $dias;
    echo "<br>";
    
    $horas = $dias*24;
    echo "El equivalente en horas es de " . $horas;
    echo "<br>";
    
    $minutos = $horas*60;
    echo "El equivalente en minutos es de " . $minutos;
    echo "<br>";
    
    $segundos = $minutos*60;
    echo "El equivalente en segundos es de " . $segundos;
    echo "<br>";
    
}

