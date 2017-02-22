<?php
// https://www.youtube.com/watch?v=DOkVYLsy0pQ
//las funciones pueden devolver valores

function iva($base, $tipo_iva){
    $iva = ($base * $tipo_iva) / 100;
    //devuelvo el valor con return
    return $iva;
}

echo "Mi ordenador cuesta 1000 euros más IVA. Es decir 1000 + " . iva(1000, 21) . " de iva!";
//ahora utilizaría esa funcion para calcular el total, metiendo dentro de una operacion
$total = 1000 + iva(1000, 18);
echo "<br>EL total de mi compra fue: " . $total; 

//los libros tienen otro tipo de iva...
echo"<br><br> Mi libro me costó 15€. Y contanod el iva, pagué: " . (15 + iva(15, 8)) . " €";
echo"<br><br>";

//////////

//funcion para calcular el valor mínimo de un array

function array_minimo($miarray){
    $minimo= null; //el null es nada, no está definido 
    for ($i=0; $i<count($miarray); $i++){ //el count es el numero de posiciones que tiene el array
        if(is_null($minimo)){
            $minimo = $miarray[$i];
        }
        else{
            if ($miarray[$i]<$minimo){
                $minimo = $miarray[$i];
            }
        }
    }
    return $minimo;
}

$array1 = array(457, 4545, 86, 4, 98, 2, 9, 45);
echo "el mínimo de array1 es: " . array_minimo(array1);
echo"<br><br>";

$array2 = array(90, 23, 96, 22, 19);
echo "Otro minimo " . array_minimo($array2);

//////// esto son dos ejemplos para que nos saque el mínimo de array1 y array2