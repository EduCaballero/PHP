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
        $articulo = $_POST['articulo'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        
        $totalneto = $cantidad*$precio;
        $iva = $precio*0.21;
        $ivaXproducto = $iva*$cantidad;
        $totaliva = $totalneto+$ivaXproducto;
        
        echo "---FACTURA--- <br>";
        echo "============= <br>";
        echo "Asticulos: $articulo <br>";
        echo "Cantidad: $cantidad <br>";
        echo "Precio x product.: $precio <br>";
        echo "----------------------------- <br>";
        echo "Total Neto: $totalneto <br>";
        echo "IVA x product.: $iva <br>";
        echo "Total (IVA): $totaliva <br>";
        ?>
    </body>
</html>
