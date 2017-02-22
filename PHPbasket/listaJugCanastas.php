<?php

/* 
 * Fichero que mostrará listado de nombres de alumnos
 * para que el usuario escoja cuál quiere modificar
 */

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';
if (isset($_POST['select'])) {
    $team = $_POST['puntos'];
    $resultado = selectJugEquipo($team);
    echo "<h2> Listado de jugadores del equipo $team </h2><br><br>";
    echo "<table border =1><tr><th>Nombre</th></tr>";
// Mientras la consulta tenga filas
    while ($fila = mysqli_fetch_array($resultado)) {
        // Sacamos los datos de la fila
        extract($fila);
        // Los mostramos por pantalla
        // Los nombres de las variables serán SIEMPRE
        // iguales a los nombres de los campos en la BBDD
        echo "<tr><td>$name</td></tr>";
    }

    echo "</table><br>";
}

else{
// Formulario para que escoja el jugador
echo "<form action='' method='post'>"; //haciendo esto es para que sea en la misma página
echo "Selecciona el equipo: ";
echo "<input type='numer' name='puntos'>";
echo "</select>";
echo "<input type='submit' name='select' value='Seleccionar'>";
echo "</form>";
}
?>