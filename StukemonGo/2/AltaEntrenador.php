<?php
/*
 * Formulario para dar de alta un entrenador en la BBDD
 */
require_once 'bbdd.php';

// Comprobamos si se ha pulsado botón "alta"
if (isset($_POST['alta'])) {
   // Recogemos los datos del post
   $nombre = $_POST['nombre'];
   $pokeballs = $_POST['pokeballs'];
   $pociones = $_POST['pociones'];
   $puntos = $_POST['puntos'];
   // Llamamos a la función que guarda los datos en la bbdd
   insertarEntrenador($nombre, $pokeballs, $pociones, $puntos);
} else {
// Formulario de alta entrenador
    echo "<form action ='' method='POST'>";
    echo "Nombre: <input type='text' name='nombre' required><br>";
    echo "Nº Pokeballs: <input type='number' name='pokeballs' required><br>";
    echo "Nº Pociones: <input type='number' name='pociones' required><br>";
    echo "<input type='hidden' name='puntos' value='0' required><br>";
    echo "<input type='submit' name='alta' value='Alta'>";
    echo "</form>";
}

