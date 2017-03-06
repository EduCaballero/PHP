<?php

// incluimos el fichero de la bbdd
require_once 'bbddStukemon.php';

// Llamamos al método que devuelve todos los datos de los pokemon
$pokemon = todosPokemonOrdenDesc();

// Mostramos título del listado
echo "<table border =1>
<caption>Listado de Pokemon</caption>
<tr>
<th> Nombre </th><th> Tipo </th><th> Habilidad </th><th> Ataque </th><th> Defensa </th><th> Velocidad </th><th> Vida </th><th> Nivel </th><th> Entrenador </th>
</tr>";
// Mientras haya datos, leemos la fila y la mostramos
while ($fila = mysqli_fetch_array($pokemon)) {
    echo "<tr>";
    extract($fila);
    // SIEMPRE después de un extract, las variables tienen el nombre de los campos de la bbdd
    echo "<td> $name </td><td> $type </td><td> $ability </td><td> $attack </td><td> $defense </td><td> $speed </td><td> $life </td><td> $level </td><td> $trainer </td>";
    echo "</tr>";
}
echo "</table>";
