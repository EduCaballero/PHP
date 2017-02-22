<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <?php
        session_start();
        $val1 = $_GET ['usu'];
        $_SESSION["usuario"] = $val1;
        $val2 = $_GET['edad'];
        $_SESSION["edado"] = $val2;
        $val3 = $_GET['pass'];
        $_SESSION["passwd"] = $val3;
        
        
        
        if (strlen($val1) == 6 && strlen($val3) == 4){
        echo 'Bienvenido ' .$val1;
        echo "<a href='factura.php'><br>Factura</a>";
        echo "<a href='edad.php'><br>Edad</a>";
        
        
        }
               else{
               echo 'Datos no válidos';
               }
        ?>
    </body>
</html>
