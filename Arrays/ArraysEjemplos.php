<?php
// definir un array
$numeros[] = 5;
$numeros[] = 6;
$numeros[] = 1;

//Mostramos el valor del array que esta en la pos. 2
echo $numeros[2];
echo "<br>";

// otra manera de definir un array
$edades[0] = 24;
$edades[1] = 30;

//mostramos el valor del primer valor del array
echo $edades[0];
echo "<br>";

// otra manera de definir un array
$notas = array(2, 5, 8, 10, 6);
//mostramos el cuarto valor del array
echo $notas[3];
echo "<br>";

//array con clave string
$datos["nombre"] = "Pepe";
$datos["edad"] = 20;
$datos["ciudad"] = "Barcelona";

//sacamos los valores de datos
echo $datos["nombre"]." ".$datos["edad"]." ".$datos["ciudad"];
echo "<br>";

//extraemos los datos del array. esto es lo mismo que lo de arriba
extract($datos);
echo "$nombre $edad $ciudad<br>";

//otra manera de crear array con strings en las claves
$cartas = array("tipo"=> "tropa", "Elixir" => 4, "Medio"=>"terrestre");

//recorrer un array con un for tradicional
for ($i=0; $i < count($notas); $i++) {
    echo $notas[$i]." ";
}
echo "<br>";

//recorremos array usando foreach
foreach ($notas as $notaActual) {
    echo $notaActual." ";
}
echo "<br>";

//modificar el array (multiplicamos por 2 los valores de $numeros, utilizando el &
foreach ($numeros as &$numeroActual) {
    $$numeroActual *= 2;
}
//mostramos los datos a ver si se han multiplicado
foreach ($numeros as $num) {
    echo $num." ";
}
echo "<br>";
?>
