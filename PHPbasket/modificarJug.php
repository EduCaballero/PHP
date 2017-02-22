<?php

/*
 * Formulario para modificar los datos de un jugador
 */

require_once 'bbdd.php';

if (isset($_POST['modificar'])) {
    // Si han pulsado modificar
    // Recojo los datos del formulario por POST
    $nbaskets = $_POST["nbaskets"];
    $nassists = $_POST["nassists"];
    $nrebounds = $_POST["nrebounds"];
    modificarJugador($nbaskets, $nassists, $nrebounds);
} else {
// Recogemos del POST el nombre del jugador seleccionado
    $name = $_POST['player'];

// Traemos todos los datos del jugador de la bbdd
    $datos = selectJugadorByNombre($name);

// Sólo tenemos una fila, ya que sólo devuelve los datos de UN jugador
    $fila = mysqli_fetch_array($datos);
// Extraemos los datos
    extract($fila);
// Creamos el formulario y vamos rellenando los datos
    echo "<form action='' method='POST'>";
    echo "<h2>Datos del jugador $name</h2>";
    echo "<input type='hidden' name='name' value=$name><br>";
    echo "Número de encestos: <input type = 'number' name = 'nbaskets' min='0' value=$nbaskets><br>";
    echo "Número de asistencias: <input type = 'number' name = 'nassists' min='0' value=$nassists><br>";
    echo "Número de rebotes: <input type = 'number' name = 'nrebounds' min='0' value=$nrebounds><br>";
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";
}
