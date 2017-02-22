<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // contar 5 veces
        for ($i=0; $i<5; $i++) {
            echo "Valor de i con for: $i<br>";    
        }
        // contar del 0 al 4 con while
        $i = 0;
        while ($i < 5) {
            echo "Valor de i con while: $i<br>";
            $i++;
        }
        
        $suma = 0;
        // quiero que siga sumando hasta que el num supere 1000
        while ($suma < 1000) {
            $suma += rand(100, 500); // rand es random, para que sume un numero aleatorio entre 100 y 500
            echo "Suma vale $suma<br>";
        }
        
        $num = 0;
        do {
            echo "$num<br>";
            $num++;
        } while ($num < 5); // con el do while te aseguras que el programa se ejecuta mínimo una vez
        
        ?>
    </body>
</html>
