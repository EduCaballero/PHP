<?php 
$num = [];
for ($i=0;$i<40;$i++) 
	$num[] = rand(10,20);

$sum=0;
echo "Numeros en posiciones pares:<br>";
foreach ($num as $key => $value) {
	if ($key%2!=0) $sum+=$value;
	else echo "$value<br>";
}

echo "La media de los numeros en posiciones impares es ".$sum/count($num);
?>

