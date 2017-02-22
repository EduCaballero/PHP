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
        session_start();
        $val1 = $_SESSION["usuario"];
        $val2 = $_SESSION ["edado"];
        
        echo $val1. "<br>";
        echo $val2. " Años";
        $resul1 = $val2 * 12;
        $resul2 = $val2 * 365;
        $resul3 = $val2 * 8760;
        $resul4 = $val2 * 525600;
        $resul5 = $val2 * 31536000;
        echo "<br>Edad en meses: " .$resul1;
        echo "<br>Edad en dias: " .$resul2;
        echo "<br>Edad en horas: " .$resul3;
        echo "<br>Edad en minutos: " .$resul4;
        echo "<br>Edad en segundos: " .$resul5;
        
        
        ?>
    </body>
</html>
