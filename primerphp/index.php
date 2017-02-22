<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer PHP</title>
    </head>
    <body>
        <?php
            echo "Hello World :)! <br/>"; // siempre se abre la orden con echo, y se puede utilizar indistintamente ' o ". Se cierra la orden con ;
            //con '<br /> esto se hace salto de línea
            echo 'Hello World :(! <br/> <br/> <br/>';
            
            $numero1 = 5;
            $numero2 = 8;
            $suma = $numero1 + $numero2;
            $resta = $numero2 - $numero1;
            $mult = $numero1 * $numero2;
            $div = $numero2 / $numero1;
            $resto = $numero1 % $numero2;
            echo "El primer número vale $numero1 <br/>";
            echo "El segundo número vale $numero2 <br>";
            echo "El resultado de sumarlos es: $suma <br>";
            echo "El resulta de restarlos es: $resta <br>";
            echo "El resultado de la división es: $mult <br>";
            echo "El resulta de la multiplicación es: $div <br>";
            echo "El resto es: $resto <br> <br> <br> <br> <br> <br> <br>";
            echo "<br> <hr>";
            
                                 
           // Condicionales
            $edad = 30;
            if ($edad > 18) {
                echo "Ya eres adulto! Enhorabuena! <br>";
            } else if ($edad == 18) {
                echo "Justo acabas de estrenar tu mayoría de edad<br>";
            } else {
                echo "Eres menor de edad <br>";
            }
            echo "<br> <hr>";
            //escala de edades
            
            if ($edad < 6) {
                echo "Eres muy chiquitico<br>";
            } else if ($edad >= 6 && $edad<13) {
                echo "Eres un chavalín<br>";
            } else if ($edad>13 && $edad<24) {
                echo "Quién te va a aguantar!! Eres un pipiolo!<br>";
            } else if ($edad == 13 || $edad ==24) {
                echo "Estás en el umbral de la adolescencia<br>";
            } else if ($edad >24 && $edad <50) {
                echo "Estás en la flor de la vida (NO)<br>";
            } else {
                echo "Hay que empezar a cuidarse... <br>";
            }
          
            // Ejemplo: en la variable tenemos el número de día y 
            // devolvemos el nombre del día de la semana al que corresponde
            // 1 - lunes, 2 - martes, etc...
            // Variables del nº de día
            $dia = 4;
            
            switch ($dia) {
                case 1: 
                    echo "Lunes<br>";
                    break; // con esto haces que se ejecute sólo una orden, y no desde el número que le has dado hasta el final
                case 2: 
                    echo "Martes<br>";
                    break;
                case 3: 
                    echo "Miércoles<br>";
                    break;
                case 4: 
                    echo "Jueves<br>";
                    break;                
               case 5: 
                    echo "Viernes<br>";
                    break;
                case 6: 
                    echo "Sábado<br>";
                    break;
                case 7: 
                    echo "Domingo<br>";
                    break;
                default:
                    echo "Número de semana incorrecto<br>";

    }
            
        ?>
    </body>
</html>
