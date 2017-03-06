<?php

//Aquí escogemos el entrenador que quiere conseguir pociones

require_once 'bbddStukemon.php';

    echo "<form action='pociones2.php' method='POST'>
        Entrenador:<select name='entrenador'>";
    
// Datos de los entrenadores
    $entrenadores = selectNombresEntrenadores();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>
    <input type='submit' name='enviar' value='Siguiente'>
    </form>";
