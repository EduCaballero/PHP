<?php

//Batalla de los pokemon

require_once 'bbddStukemon.php';

// Recogemos los pokemons del post
$pokemon1 = $_POST['pokemon1'];
$pokemon2 = $_POST['pokemon2'];
$entrenador1 = $_POST['entrenador1'];
$entrenador2 = $_POST['entrenador2'];
echo "<h1>THE BATTLE BEGINS</h1>";

// Cargamos los datos del pokemon del entrenador1
$datos = datosPokemon($pokemon1);
$fila = mysqli_fetch_array($datos);
extract($fila);
echo "Entranador 1 $entrenador1<br>
    ------------------------------------<br>
    Nombre Pokemon: $pokemon1<br>
    Tipo: $type<br>
    Habilidad: $ability<br>
    Defensa: $defense<br>
    Velocidad: $speed<br>
    Vida: $life<br>
    Nivel: $level<br>
    ------------------------------------<br>
    ------------------------------------<br><br>";

// Cargamos los datos del pokemon del entrenador2
$datos = datosPokemon($pokemon2);
$fila = mysqli_fetch_array($datos);
extract($fila);
echo "Entranador 2 $entrenador2<br>
    ------------------------------------<br>
    Nombre Pokemon: $pokemon2<br>
    Tipo: $type<br>
    Habilidad: $ability<br>
    Defensa: $defense<br>
    Velocidad: $speed<br>
    Vida: $life<br>
    Nivel: $level<br>
    ------------------------------------<br>
    ------------------------------------<br><br>
    <h4>Comabate</h4>";

// Cargamos los datos del pokemon del entrenador1 para realizar el ataque
$datos = pokemonEnt1Ataque($pokemon1);
$fila = mysqli_fetch_array($datos);
extract($fila);
echo "Nombre Pokemon: $pokemon1<br>
    Fuerza en ataque: $ataque1<br>
    Vida: $vida1<br>
    ------------------------------------<br><br>";

// Cargamos los datos del pokemon del entrenador2 para realizar el ataque
$datos = pokemonEnt2Ataque($pokemon2);
$fila = mysqli_fetch_array($datos);
extract($fila);
echo "Nombre Pokemon: $pokemon2<br>
    Fuerza en ataque: $ataque2<br>
    Vida: $vida2<br>
    ------------------------------------<br>
    ------------------------------------<br><br>
    <h3>Resultado batalla</h3>";

//Empieza la batalla
$resul2 = ($vida1 - $ataque2);
$resul1 = ($vida2 - $ataque1);
echo "$pokemon1 golpea a $pokemon2 con $ataque1 puntos de ataque! $pokemon2 queda en $resul1 puntos de vida<br>";
echo "$pokemon2 golpea a $pokemon1 con $ataque2 puntos de ataque! $pokemon1 queda en $resul2 puntos de vida<br>";

//Resultado de la pelea
if ($resul1 > $resul2) {
    $winner = $pokemon2;
    $entrenadorVencedor = $entrenador2;
    $entrenadorPerdedor = $entrenador1;
    echo "El Pokemon $pokemon2 de $entrenador2 gana";
} else if ($resul2 > $resul1) {
    $winner = $pokemon1;
    $entrenadorVencedor = $entrenador1;
    $entrenadorPerdedor = $entrenador2;
    echo "El Pokemon $pokemon1 de $entrenador1 gana";
} else if ($resul1 == $resul2)
    echo "Empate!";

resultadoVidaPokemon1($resul2, $pokemon1);
resultadoVidaPokemon2($resul1, $pokemon2);

//esto podría hacerse mejor en los if de arriba y optimizar código
if ($resul1 != $resul2) {
    datosResultadoBatalla($pokemon1, $pokemon2, $winner);
    nivelGanadorUP($winner);
    expGanador($entrenadorVencedor);
    expPerdedor($entrenadorPerdedor);
}
