<?php

/* 
 * Página que permitirá escoger una ciudad y borrarla de la bbdd
 */
require_once 'transportbbdd.php';

//Si se ha pulsado borrar
if(isset($_POST['borrar'])){
    //Recogemos las variables del post (el código postal)
    $cp=$_POST['ciudad'];
    borrarCiudad($cp);
}else{

//Formulario que permite escoger la ciudad al usuario
echo"<form action='' method='POST'>";
echo"Escoge la ciudad que quieras borrar";
echo "<select name='ciudad'>";
//traemos los datos de las ciudades
$ciudades =  selectAllCiudades();
while($fila=  mysqli_fetch_array($ciudades)){
    extract($fila);
    //Mostramos el código postal y el nombre al usuario pero como valor
    //necesitamos guardar el código postal que es lo que lo identifica en
    //la bbdd
    echo"<option value='$postalcode'>$postalcode $name";
    echo "</option>";
}
echo "</select>";
echo"<input type='submit' name='borrar' value='Borrar'>";
echo"</form>";
}


