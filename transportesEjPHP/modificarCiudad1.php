<?php

/* 
 * Página que nos permite seleccionar la ciudad que queremos modificar
 */

require_once 'transportbbdd.php';
echo"<form action='modificarCiudad2.php' method='POST'>";
echo"Escoge la ciudad que quieras modificar";
echo "<select name='ciudad'>";
$ciudades =  selectAllCiudades();
while($fila=  mysqli_fetch_array($ciudades)){
    extract($fila);
    echo"<option value='$postalcode'>$postalcode $name";
    echo "</option>";
}
echo "</select>";
echo"<input type='submit' name='borrar' value='Modificar'>";
echo"</form>";


