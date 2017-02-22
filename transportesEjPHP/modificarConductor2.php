<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'transportbbdd.php';
if(isset($_POST['modificar'])){
    //Recogemos del POST
    $dniactual=$_POST['dniactual'];
    $dninuevo=$_POST['dninuevo'];
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $salario=$_POST['salario'];
    //llamamos a la función que modifica los datos en la bbdd
modificarConductor($dniactual, $dninuevo, $nombre, $telefono, $salario);
     }else{
//Recogemos el conductor seleccionado del post (dni)
$dni=$_POST['conductor'];
//Cargamos los datos de la ciudad seleccionada en la bbdd
$datos= selectConductorByDNI($dni);
$fila=  mysqli_fetch_array($datos);
extract($fila);
echo"<form action='' method='POST'>";
//Campo oculto para guardar el dni actual
echo "<input type='hidden' name='dniactual' value='$dni'>";
echo"DNI: <input type='text' name='dninuevo' value='$dni'>";
echo"Nombre: <input type='text' name='nombre' value='$name'>";
echo"Telefono: <input type='number' name='telefono' value='$phone'>";
echo"Salario: <input type='number' name='salario' value='$salary'>";
echo"<input type='submit' value='Modificar' name='modificar'>";
echo"</form>";
}