<?php

/*
 * Página que permitirá escoger dos entrenadores
 */

require_once 'bbdd.php';

    echo "<form action='BatallaSeleccionPokemon.php' method='POST'>";
    echo "Escoge los entrenadores que van a luchar: <br>";
    echo "Entrenador 1:<select name='entrenador1'>";
// Traemos los datos de los entrenadores
    $entrenadores = AllEntrenadoresMin1Pokemon();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    
    echo "Entrenador 2:<select name='entrenador2'>";
// Traemos los datos de los entrenadores
    $entrenadores = AllEntrenadoresMin1Pokemon();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    
    echo "<input type='submit' name='enviar' value='Siguiente'>";
    echo "</form>";



