<?php 

$datos = array("Ciudad" => "Castelldefels" , "Comarca"=>"Baix Llobregat","Provincia"=>"Barcelona", "Orden" => 15, "Valoracion"=> 9, "Playa" => "Si");

foreach ($datos as $key => $value) {
	echo "$key - $value <br>";
}
echo "<br>";

$datos["Orden"] = 88;
foreach ($datos as $key => $value) {
	echo "$key - $value <br>";
}
echo "<br>";

unset($datos["Playa"]);
foreach ($datos as $key => $value) {
	echo "$key - $value <br>";
}

?>