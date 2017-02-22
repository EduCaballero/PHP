<?php

function aprobados($notas){
    $aprobados=0;
    $numeroalumnos=0;
    for ($i = 0; $i < count($notas); $i++) {
            $numeroalumnos++;
            if($notas[$i]>=5){
                $aprobados++;
            }
        }
        
        echo"El % de alumnos aprobados es " . (($aprobados/$numeroalumnos)*100);
}

$arraynotas = array(3, 5, 8, 10, 6);

echo aprobados($arraynotas);
?>