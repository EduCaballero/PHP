<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aprendiendo arrays</title>
    </head>
    <body>
        <?php
        // Definir una array
        $numeros[] = 5;
        $numeros[] = 6;
        $numeros[] = 1;

        // Mostramos el valor del array que está en la pos. 2
        echo $numeros[2];
        echo "<br>";

        // Otra manera de definir un array
        $edades[0] = 24;
        $edades[1] = 30;

        // Mostramos el valor del primer valor del array
        echo $edades[0];
        echo "<br>";

        // Otra manera de definir un array
        $notas = array(2, 5, 8, 10, 6);
        // Mostramos el cuarto valor del array
        echo $notas[3];
        echo "<br>";

        // Array con clave String
        $datos["nombre"] = "Pepe";
        $datos["edad"] = 20;
        $datos["ciudad"] = "Barcelona";

        // Sacamos los valorres  de datos
        echo $datos["nombre"] . " " . $datos["edad"] . " " . $datos["ciudad"];
        echo "<br>";

        // Extraemos los datos del array
        extract($datos);
        echo "$nombre $edad $ciudad<br>";

        // Otra manera de crear un array con Strings en clave
        $cartas = array("tipo" => "tropa", "elixir" => 4, "medio" => "terrestre");

        // Sacamos el medio de $cartas
        echo $cartas["medio"];
        echo "<br>";
        // $notas = array(2, 5, 8, 10, 6);
        // Recorrer un array con un for tradicional para mostrar los valores
        for ($i = 0; $i < count($notas); $i++) {
            echo $notas[$i]." ";
        }
        echo "<br>";
        // Recorremos array usando foreach
        foreach ($notas as $notaActual) {
            echo $notaActual." ";
        }
        echo "<br>";
        
        // Modificar el array (multiplicamos por 2 los valores de $numeros
        foreach ($numeros as &$numeroActual) {
            $numeroActual *= 2;
        }
        
        // Mostramos los datos a ver si se han multiplicado
        foreach ($numeros as $num) {
            echo $num." ";
        }
        echo "<br>";
       
        ?>
    </body>
</html>