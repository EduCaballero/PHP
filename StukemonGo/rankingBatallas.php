<?php

// incluimos el fichero de la bbdd
require_once 'bbddStukemon.php';

// Llamamos al método que devuelve todos los datos de los pokemon
$batalla = ganadoresBatallas();

// Mostramos título del listado
echo "<table border=1>
    <caption>Listado de Entrenadores</caption>
    <tr>
    <th> Entrenador </th><th> Victorias </th>
    </tr>";

// Mientras haya datos, leemos la fila y la mostramos
while ($fila = mysqli_fetch_array($batalla)) {
    echo "<tr>";
    extract($fila);
    // SIEMPRE después de un extract, las variables
    // tienen el nombre de los campos de la bbdd
    echo "<td> $winner </td><td> $ganado </td>";
    echo "</tr>";
}
echo "</table>";
