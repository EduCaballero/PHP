<?php

/*
 * Página que permitirá escogernentrenador
 */

require_once 'bbdd.php';

    echo "<form action='MejorarVidaSelectPokemon.php' method='POST'>";
    echo "Escoge el entrenador:<select name='entrenador'>";
// Traemos los datos de los entrenadores
    $entrenadores = AllEntrenadoresMin1Pocion();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    echo "<input type='submit' name='enviar' value='Siguiente'>";
    echo "</form>";
