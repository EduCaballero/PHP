<?php

/* 
 * Fichero que ejecutará la consulta de listado alumnos
 * y mostrará el resultado por pantalla
 * 
 */

// Incluimos fichero de funciones de bbdd
require_once 'bbdd.php';

// Llamamos a la función que ejecuta la consulta
$resultado = selectAllJugadores();
// Mostramos resultado de la consulta por pantalla
echo "<h2> Listado de jugadores </h2><br><br>";
echo "<table border =1><tr><th>Nombre</th>, <th>Fecha de nacimiento</th>, <th>Número de encestos</th>, <th>Número de asistencias</th>, <th>Número de rebotes</th>, <th>Posición</th>, <th>Equipo</th></tr><br>";
// Mientras la consulta tenga filas
while ($fila = mysqli_fetch_array($resultado)) {
    // Sacamos los datos de la fila
    extract($fila);
    // Los mostramos por pantalla
    // Los nombres de las variables serán SIEMPRE
    // iguales a los nombres de los campos en la BBDD
    echo "<tr><td>$name</td>, <td>$birth</td>, <td>$nbaskets</td>, <td>$nassists</td>, <td>$nrebounds</td>, <td>$position</td>, <td>$team</td></tr></table><br>";
}
//
//foreach ($resultado as $fila) {
//    foreach ($fila as $valor) {
//        echo "$valor";
//    }
//    echo "<br>";
//}