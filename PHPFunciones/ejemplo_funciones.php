<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo de Funciones</title>
    </head>
    <body>
        <?php
        $n = "Pepe";
        saludar($n);
        saludar("Maria");
        $nombre="Eusebio";
        saludar($nombre);
        saludar($nombre);
        saludar();
        $r = suma(234, 456, 567);
        echo "El resultado de la suma es $r<br>";
        $x = suma(5);
        $esMultiplo = multiploDeTres(23456);
        if ($esMultiplo == true) {
            echo "23456 es múltiplo de tres<br>";
        } else {
            echo "23456 no es múltiplo de tres<br>";
        }
        $mivariable = 5;
        echo "mi variable vale: $mivariable<br>";
        valor($mivariable);
        echo "Después de llamar a valor vale: $mivariable<br>";
        referencia($mivariable);
        echo "Después de llamar a referencia vale: $mivariable<br>";
        ?>

        <?php
        // Bloque para las funciones
        
        // Ejemplo de paso por referencia
        function referencia(&$a) {
            $a+=10;
        }
        
        // Ejemplo de paso por valor
        function valor($a) {
            $a+=10;
        }

        // Función con dos returns (OJO!! Devuelve un único valor
        // Indica si un número es múltiplo de 3
        function multiploDeTres($numero) {
            if($numero % 3 == 0) {
                return true;
            } else {
                return false;
            }
        }
         
         
        // Función que suma dos números
        function suma($a=1, $b=3) {
            $resultado = $a + $b;
            return $resultado;
        }
        
        // Procedimiento que saluda
        function saludar($nombre="amigo") {
            echo "hola $nombre<br>";
            $nombre="Miguel";
        }
        ?>
    </body>
</html>