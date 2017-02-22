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
       echo "Buenos dias " .$val1;
        ?>
        <h1>Introduce:</h1>
        <form action="datos.php" action="esta">
            : <input name="usu" type="text"/>
            Edad: <input name="edad" type="number" min="1" max="100"/><br>
            Password(4 caracteres): <input name="pass" type="password"  max="10"/>
            <input type="submit" value="Enviar"/>
            
        </form>   
    </body>
</html>
