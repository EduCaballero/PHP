<?php
$n1 = 9;
$n2 = 9;

if ($n1>$n2) {
    while ($n1>$n2) { 
        $n1--;
    echo "$n1<br>"; }
}

else if ($n1<$n2) {
    while ($n1<$n2) { 
        $n1++;
    echo "$n1<br>"; }
}

else echo "Los números son iguales";