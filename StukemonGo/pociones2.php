<?php

//Aquí seleccionaremos la cantidad de pociones a añadir para el entrenador anteriormente seleccionado

require_once 'bbddStukemon.php';

if (isset($_POST['adquirir'])) {
    
    $cantidadPosible = $_POST['cantidadPosible'];
    $pociones = $_POST['pociones'];
    $entrenador = $_POST['entrenador'];
    if(($cantidadPosible/10)>=$pociones){
       echo "Compra realizada con éxito. Gracias por su visita!<br>";
       modificarPociones($pociones,$entrenador);
       $pociones = $pociones*10;
       modificarPuntos($pociones,$entrenador);
       $datosEntrenador = datosEntrenador($entrenador);
        while ($datos = mysqli_fetch_array($datosEntrenador)) {
            extract($datos);
            echo "Ahora tienes $potions pociones y te quedan $points puntos";
        }
        echo "<br><a href='index.php'>Volver</a>";
       
    }else{
       $necesitas = ($pociones-($cantidadPosible/10))*10; //Esto es para ver la cantidad podemos comprar y después los puntos que hacen falta
       echo "No tienes suficientes puntos. $necesitas puntos son necesarios para adquirir $pociones pociones";
       echo "<br><a href='index.php'>Volver</a>";
   } 
    
} else {
    $entrenador = $_POST['entrenador'];
    echo "<form action='' method='POST'>";
     $puntosEntrenador = puntosEntrenador($entrenador);
    while ($cantidadPosible = mysqli_fetch_array($puntosEntrenador)) {
        extract($cantidadPosible);
         echo "<input type='hidden' name='cantidadPosible' value='$points'>";
    }
    echo "<input type='hidden' name='entrenador' value='$entrenador'>
        <h4>Adquirir</h4>
        Pociones: <input type='number' name='pociones'>
        <input type='submit' name='adquirir' value='Adquirir'>
        </form>";
}
