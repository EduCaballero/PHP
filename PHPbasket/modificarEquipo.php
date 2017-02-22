<?php

/* 
 * Fichero que mostrará listado de nombres de alumnos
 * para que el usuario escoja cuál quiere modificar
 */

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';

// Formulario para que escoja el jugador
echo "<form action='modificarEqJug.php' method='post'>";
echo "Selecciona el jugador a modificar: ";
echo "<select name='player'>";
// Leemos los nombres de la bbdd
$names = selectNombresJugadores();
// Vamos extrayendo los nombres y añadiendolos a la lista
while ($fila=  mysqli_fetch_array($names)) {
    extract($fila);
    echo "<option value='$name'>$name</option>";
}
echo "</select>";
echo "<input type='submit' value='Seleccionar'>";
echo "</form>";

