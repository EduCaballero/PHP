<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- formulario que inventa un número aleatorio-->
        <?php
        $d=rand(1,10);
        ?>
        <form method="POST" action="">
            ¡Intenta acertar el número del 1 al 10 que he pensado!
            <input type="number" name="cantidad"><br>
            <input type="submit" value="Enviar"><br>
        </form>
        <?php
            //validamos que haya introducido una cantidad
            if (isset($_POST["cantidad"])){
            //Leemos la cantidad indicada por el usuario
                $cantidad = $_POST["cantidad"];
            
                if ($cantidad==$d) echo "¡Felicidades! Acertaste";
            
            else echo "Error, vuelve a intentarlo";
            }
            
            
        ?>
    </body>
</html>