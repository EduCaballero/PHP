<?php

/* 
 * página que mostrará todos los datos de todas las ciudades que hay en la bbdd
 */

//incluimos el fichero en la bbdd
require_once 'transportbbdd.php';

//Llamamos al método que devuelve todos los datos de las ciudades
$ciudades=  selectAllCiudades();

//Mostramos título del listado
echo "<h2>Listado de ciudades</h2>";
//Mientreas haya datos, leemos la fila y la mostramos
while($fila=  mysqli_fetch_array($ciudades)){
    extract($fila);
    //SIEMPRE después d eun extract, las variables tienen el nombre de
    // los campos de la bbdd
    echo"$postalcode $name<br>"; //estas variables debe ser igual que los de la base de datos
}

