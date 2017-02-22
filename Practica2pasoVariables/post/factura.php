<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>FACTURA</title>
    </head>
    <body>
        <form method="POST" action="facturaRESUL.php"> 
           Articulo: <input type="text" name="articulo" placeholder="Descripcion">
           Cantidad: <input type="number" name="cantidad" placeholder="numero">
           Precio: <input type="text" name="precio" placeholder="valor">
        <input type="submit" name="enviar" value="ENVIAR" />
        </form>
    </body>
</html>
