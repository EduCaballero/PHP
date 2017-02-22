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

         echo 'Hola ' .$val1;
        ?>
        </br><h1>Horas</h1>
        <form action="calculo.php" action="esta">
            Numero de horas: <input name="hora" type="number"/>
            Numero de horas extras: <input name="horas" type="number"/><br>
            <input type="submit" value="Enviar"/>
            
        </form>   
    </body>
</html>
