<?php

/* 
 * Fichero que mostrará listado de nombres de alumnos
 * para que el usuario escoja cuál quiere modificar
 */

// Necesitamos el fichero de la bbdd
require_once 'bbdd.php';

if(isset($_POST['borrar'])){
    
   $dni=$_POST['cocinero'];
    selectCocineroBorrar($dni); 
}

else{
// Formulario para que escoja el cocinero
echo "<form action='' method='post'>"; //haciendo esto es para que sea en la misma página

echo'Selecciona el cocinero a borrar:<select name="cocinero">';       
            $clientePide = llamoCocineros();
            while ($fila = mysqli_fetch_array($clientePide)) {
            extract($fila);
            echo "<option value='$dni'>$nombre $apellidos";
            echo '</option>';
            }
            echo '</select><br>';

echo "<input type='submit' name='borrar' value='Seleccionar'>";
echo "</form>";
}
?>