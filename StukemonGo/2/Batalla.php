<?php

/*
 * Batalla entre pokemon1 y pokemon2
 */

require_once 'bbdd.php';

// Recogemos los pokemons del post (Nombres)
    $pokemon1 = $_POST['pokemon1'];
    $pokemon2 = $_POST['pokemon2'];
    $entrenador1 = $_POST['entrenador1'];
    $entrenador2 = $_POST['entrenador2'];
    echo "<h1>Batalla. A luchar!!!</h1>";
    echo "<h4>Datos Actuales</h4>";
// Cargamos los datos de el pokemon1
    $datos = selectDatosPokemon($pokemon1);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "Nombre Pokemon: $pokemon1<br>";
    echo "Tipo: $type<br>";
    echo "Habilidad: $ability<br>";
    echo "Defensa: $defense<br>";
    echo "Velocidad: $speed<br>";
    echo "Vida: $life<br>";
    echo "Nivel: $level<br>";
    echo "--------------------------<br><br>";
    // Cargamos los datos de el pokemon2
    $datos = selectDatosPokemon($pokemon2);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "Nombre Pokemon: $pokemon2<br>";
    echo "Tipo: $type<br>";
    echo "Habilidad: $ability<br>";
    echo "Defensa: $defense<br>";
    echo "Velocidad: $speed<br>";
    echo "Vida: $life<br>";
    echo "Nivel: $level<br>";
    echo "<h4>Datos de ataque</h4>";
    // Cargamos los datos de el pokemon1 para atacar
    $datos = selectDatosPokemon1Ataque($pokemon1);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "Nombre Pokemon: $pokemon1<br>";
    echo "Fuerza en ataque: $ataque1<br>";
    echo "Vida: $vida1";
    echo "<br>--------------------------<br><br>";
    // Cargamos los datos de el pokemon2 para atacar
    $datos = selectDatosPokemon2Ataque($pokemon2);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "Nombre Pokemon: $pokemon2<br>";
    echo "Fuerza en ataque: $ataque2<br>";
    echo "Vida: $vida2<br>";
    echo "<h4>Informacion de batalla</h4>";
    //Recreamos la batalla
    $resul2=($vida1-$ataque2);
    $resul1=($vida2-$ataque1);
    echo "$pokemon1 ataca con $ataque1 putos de ataque a $pokemon2 y sequeda con $resul1 puntos de vida<br>";
    echo "$pokemon2 ataca con $ataque2 putos de ataque a $pokemon1 y sequeda con $resul2 puntos de vida<br>";
    
    //Quien ha ganado?
    
    if($resul1>$resul2){
        $ganador=$pokemon2;
        $entrenadorGanador = $entrenador2;
        $entrenadorPerdedor = $entrenador1;
        echo "$pokemon2 ha Ganado la batalla";
    }
    else if($resul2>$resul1){
        $ganador=$pokemon1;
        $entrenadorGanador = $entrenador1;
        $entrenadorPerdedor = $entrenador2;
        echo "$pokemon1 ha Ganado la batalla"; 
    }else if($resul1=$resul2)echo "Han empatado";
    
    actualizarVidaPokemon1($resul2,$pokemon1);
    actualizarVidaPokemon2($resul1,$pokemon2);
    
    if($resul1!=$resul2){
    datosBatalla($pokemon1, $pokemon2, $ganador);
    puntoNivelGanador($ganador);
    experienciaGanador($entrenadorGanador);
    experienciaPerdedor($entrenadorPerdedor);
    }
