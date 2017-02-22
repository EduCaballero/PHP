<?php
$i=0;
$suma=0;
$media=0;
for($i=0;$i < 10;$i++){
    if($i%2!=0)$suma=$suma+$i; 
    $media++;
}
echo "La suma es $suma<br>";
echo "La media es ".($suma/$media)." ";
?>
