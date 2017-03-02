<?php

//Página para escoger entrenadores que van a combatir

require_once 'bbddStukemon.php';

    echo "<form action='escogerPokemonBatalla.php' method='POST'>
    Escoge los entrenadores para la contienda: <br>
    Primer entrenador:<select name='entrenador1'>";
// Traemos los datos de los entrenadores
    $ent1 = entrenadorMin1Pokemon();
    while ($fila = mysqli_fetch_array($ent1)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    
    echo "Segundo entrenador:<select name='entrenador2'>";
// Traemos los datos de los entrenadores
    $ent2 = entrenadorMin1Pokemon();
    while ($fila = mysqli_fetch_array($ent2)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>
    
    <input type='submit' name='enviar' value='Escoger Pokemon'>
    </form>";



