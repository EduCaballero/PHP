
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios PHP 2</title>
    </head>
    <body>
        <?php
        $num1 = 30;
        $num2 = 60;
        if ($num1 > $num2) {
            echo "¡El primer número es mayor!<br>";
        } else if ($num1 < $num2) {
            echo "¡El primer número es menor!<br>";
        } else {
            echo "¡Es igual!<br>";
        }
        $suma = $num1 + $num2;
        $resta = $num2 - $num1;
        echo "El resultado de sumarlos es: $suma <br>";
        echo "El resulta de restarlos es: $resta <br>";
        
        ?>