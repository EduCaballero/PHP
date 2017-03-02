<?php

/* 
 * Fichero que incluirá todas las funciones relacionadas
 * con la base de datos
 */

function selectAllPokemonsEntrenador($entrenador) {
    $con = conectar("stukemon");
    $select = "select name, life from pokemon where trainer = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve nombres de entrenadores con minimo 1 pocion
function AllEntrenadoresMin1Pocion() {
    $con = conectar("stukemon");
    $select = "select trainer.name from trainer where potions>0;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//Le subimos 1 punto al entrenador perdedor
function experienciaPerdedor($entrenadorPerdedor) {
    $con = conectar("stukemon");
    $update = "update trainer set points=points+1 where name='$entrenadorPerdedor'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Le subimos 10 puntos al entrenador ganador
function experienciaGanador($entrenadorGanador) {
    $con = conectar("stukemon");
    $update = "update trainer set points=points+10 where name='$entrenadorGanador'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Le subimos un 1 nivel al pokemon ganador
function puntoNivelGanador($ganador) {
    $con = conectar("stukemon");
    $update = "update pokemon set level=level+1 where name='$ganador'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Actualizamos la vida del pokemon 2
function actualizarVidaPokemon2($resul1, $pokemon2) {
    $con = conectar("stukemon");
    $update = "update pokemon set life='$resul1' where name='$pokemon2'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Actualizamos la vida del pokemon 1
function actualizarVidaPokemon1($resul2, $pokemon1) {
    $con = conectar("stukemon");
    $update = "update pokemon set life='$resul2' where name='$pokemon1'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

// Función que introduce los datos de la batalla en la base de datos
function datosBatalla($pokemon1, $pokemon2, $ganador) {
    $con = conectar("stukemon");
    $select = "insert into battle(pokemon1, pokemon2, winner) values ('$pokemon1', '$pokemon2', '$ganador')";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve datos del Pokemon 1 para atacar
function selectDatosPokemon1Ataque($pokemon) {
    $con = conectar("stukemon");
    $select = "select attack+2*level as ataque1, life as vida1 from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve datos del Pokemon 2 para atacar
function selectDatosPokemon2Ataque($pokemon) {
    $con = conectar("stukemon");
    $select = "select attack+2*level as ataque2,life as vida2 from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve datos del Pokemon
function selectDatosPokemon($pokemon) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve pokemon de entrenador 1 
function SelectPokemonEntrenador1($entrenador1) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where trainer='$entrenador1'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve pokemon de entrenador 2 
function SelectPokemonEntrenador2($entrenador2) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where trainer='$entrenador2'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve nombres de entrenadores con minimo 1 pokemon
function AllEntrenadoresMin1Pokemon() {
    $con = conectar("stukemon");
    $select = "select trainer.name, count(*) as cont from trainer right join pokemon on trainer.name = trainer group by trainer having cont>0;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve nombres de entrenadores con menos de 6 pokemons
function AllEntrenadoresMenos6Pokemon() {
    $con = conectar("stukemon");
    $select = "select trainer.name, count(*) as cont from trainer left join pokemon on trainer.name = trainer group by trainer having cont<6;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que inserta un pokemon en la bbdd
function insertarPokemon($nombre, $tipo, $habilidad, $ataque, $defensa, $velocidad, $vida, $nivel, $entrenador) {
    $con = conectar("stukemon");
    $insert = "insert into pokemon values ('$nombre', '$tipo', '$habilidad', '$ataque', '$defensa', '$velocidad', '$vida', '$nivel', '$entrenador')";
    // Ejecutamos la consulta
    if (mysqli_query($con, $insert)) {
        // Si ha ido bien
        echo "Pokemon dado de alta.";
    } else {
        // Sino mostramos el error
        echo mysqli_error($con);
    }
    desconectar($con);
}

// Función que inserta un entrenador en la bbdd
function insertarEntrenador($nombre, $pokeballs, $pociones, $puntos) {
    $con = conectar("stukemon");
    $insert = "insert into trainer values ('$nombre', '$pokeballs', '$pociones', '$puntos')";
    // Ejecutamos la consulta
    if (mysqli_query($con, $insert)) {
        // Si ha ido bien
        echo "Entrenador dado de alta.";
    } else {
        // Sino mostramos el error
        echo mysqli_error($con);
    }
    desconectar($con);
}

// Función para conectar con la bbdd
function conectar($database) {
    $con = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar con el centro Stukemon.");
    return $con;
}

// Función que cierra la conexión con la bbdd
function desconectar($conexion) {
    mysqli_close($conexion);
}

