<?php

//Segunda página de mejorar vida. Aquí seleccionaremos al Pokemon del entrenador préviamente seleccionado

require_once 'bbddStukemon.php';

$entrenador = $_POST['entrenador'];

// Si ha pulsado luchar
if (isset($_POST['siguiente'])) {
    $pokemon = $_POST['pokemon'];
    $entrenador = $_POST['entrenador']; //Creo que este es redundante con el de arriba
    modificarVida($pokemon);
    pocionesEntrenador($entrenador);
    echo "$entrenador ha utilizado una poción en el Pokemon $pokemon<br>
        <a href='index.php'>Volver</a>";
} else {
    $entrenador = $_POST['entrenador']; //lo mismo que el comentario anterior
    $resultado = todsPokemonsEntrenador($entrenador);
    
// Mostramos resultado de la consulta por pantalla
echo "<h4> Listado Pokemon </h4>";
echo "-------------------------------<br>";

// Mientras la consulta tenga filas
while ($fila = mysqli_fetch_array($resultado)) {
    // Sacamos los datos de la fila
    extract($fila);
    // Los mostramos por pantalla
    // Los nombres de las variables serán SIEMPRE
    // iguales a los nombres de los campos en la BBDD
    echo "$name, $life<br>";
    echo "-------------------------------<br>";
}
    echo "<form action='' method='POST'> 
        <h4>¿Qué Pokemon quieres mejorar?: </h4>
        ---------------------------------------------------<br>
        Pokemon de $entrenador:<select name='pokemon'>";// con este POST paso los datos arriba
    
// Traemos los datos de los entrenadores
    $entrenadores = pokemonEntrenador($entrenador);
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>
        <input type='hidden' name='entrenador' value='$entrenador'>
        <input type='submit' name='siguiente' value='Siguiente'>
        </form>";
}

