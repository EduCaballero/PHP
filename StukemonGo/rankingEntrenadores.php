<?php

// incluimos el fichero de la bbdd
require_once 'bbddStukemon.php';

// Llamamos al método que devuelve todos los datos de los pokemon
$entrenadores = todosEntrenadoresPuntosDesc();

// Mostramos título del listado
echo "<table border=1>
    <caption>Listado de Entrenadores</caption>
    <tr>
    <th> Nombre </th><th> Pokeballs </th><th> Pociones </th><th> Puntos </th>
    </tr>";

// Mientras haya datos, leemos la fila y la mostramos
while ($fila = mysqli_fetch_array($entrenadores)) {
    echo "<tr>";
    extract($fila);
    // SIEMPRE después de un extract, las variables
    // tienen el nombre de los campos de la bbdd
    echo "<td> $name </td><td> $pokeballs </td><td> $potions </td><td> $points </td>";
    echo "</tr>";
}
echo "</table>";
