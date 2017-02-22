<?php

$i = 0;

while ($i < 100) {
    for ($n=0; $n<10 and $i<100; $n++ ,$i+=3) {
        if ($n!=0) {
            echo ", ";
        }
        echo "$i";         
        }
    echo "<br>";    
}
?>