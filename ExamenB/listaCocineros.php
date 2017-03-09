<?php


// NO ME DA TIEMPO A NO HACER COPY/PASTE
// 
// 
// incluimos el fichero de la bbdd
require_once 'bbdd.php';

// Llamamos al método que devuelve todos los datos de los pokemon
$pokemon = listaCocineros();

// Mostramos título del listado
echo "<table border =1>
<caption>Listado de Cocineros</caption>
<tr>
<th> DNI </th><th> Nombre </th><th> Apellidos </th><th> telefono </th><th> nacimiento </th><th> fecha contratacion </th>
</tr>";
// Mientras haya datos, leemos la fila y la mostramos
while ($fila = mysqli_fetch_array($pokemon)) {
    echo "<tr>";
    extract($fila);
    // SIEMPRE después de un extract, las variables tienen el nombre de los campos de la bbdd
    echo "<td> $dni </td><td> $nombre </td><td> $apellidos </td><td> $telefono </td><td> $nacimiento </td><td> $contrato </td>";
    echo "</tr>";
}
echo "</table>";