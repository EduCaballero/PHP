<?php

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';

if (isset($_POST["enviar"])) {
            
            // Recibimos los datos del formulario (POST)

            $idplato = $_POST['plato'];
            $precio = $_POST['nuevoPrecio'];
            

            // Insertamos datos en la bbdd
            modificarPrecio($idplato, $precio);
            
            if($precio<0){
                echo "<br>";
                echo "El precio ha bajado en $precio";
            }
            
            if($precio>0){
                echo "<br>";
                echo "El precio ha subido en $precio";
            }
            
            
        } else {
            echo'<form action = "" method = "POST">';
        // Formulario para que escoja plato
        echo'Selecciona el plato:<select name="plato">';       
        $platoPide = llamoPlatos();
        while ($fila = mysqli_fetch_array($platoPide)) {
            extract($fila);
            echo "<option value='$idplato'>$nombre --- Precio actual: $precio";
            echo '</option>';
        }
            echo '</select><br>';

            echo 'Nuevo precio: <input type = "number" name = "nuevoPrecio" step="any" required><br>';

            echo'<input type = "submit" name = "enviar" value = "Modificar">';
                    echo'</form>';
            }
            ?>  