<?php

/* 
 *
 */

require_once 'transportbbdd.php';


//Comprobamos si hemos pulsado el botón de alta
if(isset($_POST['alta'])){
    //recogemos los datos del post
    $dniconductor=$_POST['dni'];
    $nombre=$_POST['name'];
    $telefono=$_POST['phone'];
    $salario=$_POST['salary'];
    //Llamamos a la funcion que guarda los datos de la bbdd
    insertarConductor($dniconductor, $nombre, $telefono, $salario); //FALTA CONDUCTOR
}else{

//formulario alta ciudad

echo "<form action='' method='POST'>";
echo"DNI: <input type='text' name='dni'>";
echo"Nombre <input type='text' name='name'>";
echo"Teléfono: <input type='text' name='phone'>";
echo"Salario: <input type='number' name='salary'>";
echo"<input type='submit' name='alta' value='Alta'>";
echo"</form>";
}
