<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculo de horas</title>
    </head>
    <body>
        <?php
        session_start();
        $val1 = $_SESSION["usuario"];
        $val2 = $_GET ['hora'];
        $val3 = $_GET ['horas'];
        
        $resul1 = $val2 * 25;
        $resul2 = $val3 * 40;
        $resul3 = $resul1 + $resul2;
        
        echo "Importe por horas: " .$resul1;
        echo "<br>Importe por horas extras: " .$resul2;
        echo "<br>Importe total: " . $resul3;
        ?>
    </body>
</html>
