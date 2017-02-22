<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'transportbbdd.php';
echo"<form action='modificarConductor2.php' method='POST'>";
echo"Escoge el conductor que quieras modificar";
echo "<select name='conductor'>";
$conductores =  selectAllConductores();
while($fila=  mysqli_fetch_array($conductores)){
    extract($fila);
    echo"<option value='$dni'>$dni $name";
    echo "</option>";
}
echo "</select>";
echo"<input type='submit' name='borrar' value='Modificar'>";
echo"</form>";


