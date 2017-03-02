<?php

/*
 * Página que permitirá escoger los pokemons de cada entrenador
 */

require_once 'bbdd.php';

$entrenador1 = $_POST['entrenador1'];
$entrenador2 = $_POST['entrenador2'];

if($entrenador1==$entrenador2) echo "Error no se puede seleccionar el mismo entrenador";
else{
// Si ha pulsado luchar
if (isset($_POST['luchar'])) {

} else {
    echo "<form action='Batalla.php' method='POST'>";
    echo "Escoge los pokemons de cada entrenador: <br>";
    echo "Pokemon de $entrenador1:<select name='pokemon1'>";
// Traemos los datos de los entrenadores
    $entrenadores = SelectPokemonEntrenador1($entrenador1);
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    
    echo "Pokemon de $entrenador2:<select name='pokemon2'>";
// Traemos los datos de los entrenadores
    $entrenadores = SelectPokemonEntrenador2($entrenador2);
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    echo "<input type='hidden' name='entrenador1' value='$entrenador1'>";
    echo "<input type='hidden' name='entrenador2' value='$entrenador2'>";
    echo "<input type='submit' name='luchar' value='Batalla'>";
    echo "</form>";
}
}