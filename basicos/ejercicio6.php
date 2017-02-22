
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios PHP 2</title>
    </head>
    <body>

        <?php
        $num1 = 3;
        $num2 = 5;
        $num3 = 8;

        if ($num3 >= 0) {
            if ($num2 == 4 or $num2 == 6 or $num2 == 9 or $num2 == 11) {
                if ($num1 > 0 && $num1 < 31) {
                    echo "La fecha $num1 / $num2 / $num3 es correcta";
                } 
            }
            
            if ($num2 == 1 or $num2 == 3 or $num2 == 5 or
                    $num2 == 7 or $num2 == 8 or $num2 == 10 or $num2 == 12) {
                if ($num1 > 0 && $num1 < 32) {
                    echo "La fecha $num1 / $num2 / $num3 es correcta";
                }
            }

            if ($num2 == 2) {
                if ($num1 > 0 && $num2 < 29)
            }