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
       
        $hora = $_POST['hora'];
        $minutos = $_POST['minutos'];
        $segundos = $_POST['segundos'];
        
         if($hora>23)echo "Error hora incorrecta";
         else if($hora<0)echo "Error hora incorrecta";
         else if($minutos>59)echo "Error hora incorrecta";
         else if($minutos<0)echo "Error hora incorrecta";
         else if($segundos>59)echo "Error hora incorrecta";
         else if($segundos<0)echo "Error hora incorrecta";
         else{
        $horaactual = "$hora:$minutos:$segundos";
       $time = strtotime($horaactual);

$endTime = date("H:i:s", strtotime('+1 seconds', $time));
echo $endTime;
        }
        ?>
    </body>
</html>
