<?php

//Primera página para mejorar la vida de un Pokemon. En esta, escogemos el entrenador

require_once 'bbddStukemon.php';

    echo "<form action='mejorarVidaPokemon.php' method='POST'>
        Entrenador:<select name='entrenador'>";
    
// Traemos los datos de los entrenadores
    $entrenadores = entrenadoresConPocion();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>
        <input type='submit' name='enviar' value='Siguiente'>
        </form>";
