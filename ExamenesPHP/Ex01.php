<?php 
$num = [];
for ($i=0;$i<50;$i++) 
	$num[] = rand(0,50);

foreach ($num as $mostrar){ //con esto muestro el array
    echo $mostrar." ";
        }
echo "<br>";

echo "Numeros iguales:<br>";
foreach ($num as $posicion=>$value) {
	if ($posicion==$value){
         echo "$value<br>";   
        }
}
?>