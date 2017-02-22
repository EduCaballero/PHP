
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

        if ($num1 < $num2 && $num1 < $num3) {
            echo "$num1<br>";
            if ($num2 < $num3)
                echo "$num2<br>$num3";
            else
                echo "$num3<br>$num2";
        } else if ($num2 < $num1 && $num2 < $num3) {
            echo "$num2<br>";
            if ($num1 < $num3)
                echo "$num1<br>$num3";
            else
                echo "$num3<br>$num1";
        } else {
            echo "$num3<br>";
            if ($num1 < $num2)
                echo "$num1<br>$num2";
            else
                echo "$num2<br>$num1";
        }
        ?>