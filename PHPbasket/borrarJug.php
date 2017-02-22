<?php

/* 
 * Fichero que mostrará listado de nombres de alumnos
 * para que el usuario escoja cuál quiere modificar
 */

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';
if(isset($_POST['borrar'])){
   $name=$_POST['player'];
    selectJugadorborrar($name); 
}

else{
// Formulario para que escoja el jugador
echo "<form action='' method='post'>"; //haciendo esto es para que sea en la misma página
echo "Selecciona el jugador a borrar: ";
echo "<select name='player'>";
// Leemos los nombres de la bbdd
$names = selectNombresJugadores();
// Vamos extrayendo los nombres y añadiendolos a la lista
while ($fila = mysqli_fetch_array($names)) {
    extract($fila);
    echo "<option value='$name'>$name</option>";
}
echo "</select>";
echo "<input type='submit' name='borrar' value='Seleccionar'>";
echo "</form>";
}
?>