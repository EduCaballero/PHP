<?php

/*
 * Página que permitirá escoger los pokemons de cada entrenador
 */

require_once 'bbdd.php';

$entrenador = $_POST['entrenador'];

// Si ha pulsado luchar
if (isset($_POST['luchar'])) {

} else {
    
    $resultado = selectAllPokemonsEntrenador($entrenador);
// Mostramos resultado de la consulta por pantalla
echo "<h2> Listado de tus Pokemons </h2>";
// Mientras la consulta tenga filas
while ($fila = mysqli_fetch_array($resultado)) {
    // Sacamos los datos de la fila
    extract($fila);
    // Los mostramos por pantalla
    // Los nombres de las variables serán SIEMPRE
    // iguales a los nombres de los campos en la BBDD
    echo "$name, $life<br>";
    echo "--------------------<br>";
}
    
    echo "<form action='Batalla.php' method='POST'>";
    echo "<h2>Escoge el pokemon para darle 1 pocion de vida: </h2><br>";
    echo "Pokemon de $entrenador:<select name='pokemon1'>";
// Traemos los datos de los entrenadores
    $entrenadores = SelectPokemonEntrenador1($entrenador);
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
}

