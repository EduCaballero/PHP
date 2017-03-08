<?php

// Función que conecta con la bbdd que se pasa por 
// parámetro y devuelve la conexión
// Si hay error muestra msg de error y se interrumpe ejecución
function conectar($database) { //función nombreQueQuiera ($nombreVariableQueQuiera)
    $conexion = mysqli_connect("localhost", "root", "", $database) //$nombreVariableQueQuiero = mysqli_connect(("localhost", "nombreUsuario", "Contraseña", $nombreVariableArriba)
            or die("No se ha podido conectar a la BBDD"); //si no conecta, muere y da este mensaje
    return $conexion;
}
//-----------------------------------------------------------------

// Función que cierra la conexión con la bbdd
function desconectar ($conexion){
    mysqli_close($conexion); //se llama conexión pero se puede llamar como quiera. Lo que hay dentro de una función muere ahí, no sale
}

//-----------------------------------------------------------------

// Función que conecta con BBDD
// Inserta un Entrenador con los valores que recibe como parámetros
// Cierra conexión con la bbdd
function insertarEntrenador($name, $pokeball, $potion) {
    // Conectamos a la bbdd, si no conecta interrumpe el programa
    $conexion = conectar("stukemon"); //se llama conexión pero se puede llamar como quiera. Lo que hay dentro de una función muere ahí, no sale

// Tenemos la conexión con la BBDD
// Preparamos el insert
    $insert = "insert into trainer 
         values('$name', $pokeball, $potion, 0)"; //el 0 son los points, el nivel, que lo he de iniciar a 0 siempre. La comilla simple mejor dejarla siempre, sin comilla, si hubiera un espacio, sólo te cogería la bbdd lo que hubiera HASTA el espacio, no lo de después
    // Insertamos en la bbdd
    if (mysqli_query($conexion, $insert)) {
        // Ha ido todo bien
        echo "Entrenador Pokémon dado de alta<br>";
    } else {
        // Si hay error lo mostramos por pantalla
        echo mysqli_error($conexion);
    }
    // Desconectamos
    desconectar($conexion);
}
//-------------------------------------------------------------------

// Función que devuelve los nombres de todos los entrenadores
function selectNombresEntrenadores() {
    $con = conectar("stukemon");
    $query = "select name from trainer";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//------------------------------------------------------------------

// Función que devuelve el nombre de los entrenadores con menos de 6 pokemons
function entrenadoresMenos6Pokemon() {
    $con = conectar("stukemon");
    $select = "select trainer.name, count(*) as cont from trainer left join pokemon on trainer.name = trainer group by trainer.name having cont<6;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------

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

//-------------------------------------------------------------------

// Función que devuelve los nombres de los entrenadores que tengan como mínimo 1 pokemon
function entrenadorMin1Pokemon() {
    $con = conectar("stukemon");
    $select = "select trainer.name, count(*) as cont from trainer right join pokemon on trainer.name = trainer group by trainer having cont>0;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-------------------------------------------------------------------

// Funciones para devolver el pokemon del entrenador 1 y el 2 respectivamente
//Entrenador 1
function pokemonEntrenador1($entrenador1) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where trainer='$entrenador1'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//Entrenador 2
function pokemonEntrenador2($entrenador2) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where trainer='$entrenador2'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//---------------------------------------------------------------------

// Función que devuelve datos del del pokemon del entrenador1 para realizar el ataque
function pokemonEnt1Ataque($pokemon) {
    $con = conectar("stukemon");
    $select = "select attack+2*level as ataque1, life as vida1 from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

// Función que devuelve datos del del pokemon del entrenador2 para realizar el ataque
function pokemonEnt2Ataque($pokemon) {
    $con = conectar("stukemon");
    $select = "select attack+2*level as ataque2,life as vida2 from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

// Función que devuelve los datos del Pokemon
function datosPokemon($pokemon) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where name='$pokemon'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Funciones para actualizar la vida de los Pokemon tras la batalla en la BBDD

//Pokemon 1
function resultadoVidaPokemon1($resul2, $pokemon1) {
    $con = conectar("stukemon");
    $update = "update pokemon set life='$resul2' where name='$pokemon1'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Pokemon 2
function resultadoVidaPokemon2($resul1, $pokemon2) {
    $con = conectar("stukemon");
    $update = "update pokemon set life='$resul1' where name='$pokemon2'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//------------------------------------------------------------------------------

// Función para cambiar los datos del resultado de la batalla en la BBDD
function datosResultadoBatalla($pokemon1, $pokemon2, $ganador) {
    $con = conectar("stukemon");
    $select = "insert into battle(pokemon1, pokemon2, winner) values ('$pokemon1', '$pokemon2', '$ganador')";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//---------------------------------------------------------------------

//Función para subir un nivel al ganador
function nivelGanadorUP($ganador) {
    $con = conectar("stukemon");
    $update = "update pokemon set level=level+1 where name='$ganador'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//----------------------------------------------------------------------

//Funciones para repartir la experiencia a los pokemons combatientes

//1 punto al entrenador perdedor
function expPerdedor($entrenadorPerdedor) {
    $con = conectar("stukemon");
    $update = "update trainer set points=points+1 where name='$entrenadorPerdedor'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//10 puntos al entrenador ganador
function expGanador($entrenadorGanador) {
    $con = conectar("stukemon");
    $update = "update trainer set points=points+10 where name='$entrenadorGanador'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//--------------------------------------------------------------------------

// Función que nos retorna el nombre d elos entrenadores que tengan pociones (mínimo 1 (>0))
function entrenadoresConPocion() {
    $con = conectar("stukemon");
    $select = "select name from trainer where name in (select trainer from pokemon) and potions >0;";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-------------------------------------------------------------------------


//Función para traer el nombre y la vida de TODOS los pokemon del entrenador seleccionado
function todsPokemonsEntrenador($entrenador) {
    $con = conectar("stukemon");
    $select = "select name, life from pokemon where trainer = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//--------------------------------------------------------------------------

// Funciones para devolver el pokemon del entrenador
function pokemonEntrenador($entrenador) {
    $con = conectar("stukemon");
    $select = "select * from pokemon where trainer='$entrenador'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Función que nos permitirá modificar (update y set) en un punto la vida de un Pokemon
function modificarVida($pokemon) {
    $con = conectar("stukemon");
    $update = "update pokemon set life = life+1 where name = '$pokemon';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $update);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Función para editar las pociones de un entrenador (restar la que hemos utilizado)
function pocionesEntrenador($entrenador) {
    $con = conectar("stukemon");
    $update = "update trainer set potions = potions-1 where name = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $update);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Función que nos devuelve los puntos que tiene un entrenador
function puntosEntrenador($entrenador) {
    $con = conectar("stukemon");
    $select = "select points from trainer where name = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Función para modificar las pociones del entrenador seleccionado
function modificarPociones($pociones,$entrenador) {
    $con = conectar("stukemon");
    $select = "update trainer set potions = potions+$pociones where name = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

//Función para modificar las puntos del entrenador que ha comprado pociones
function modificarPuntos($pociones,$entrenador) {
    $con = conectar("stukemon");
    $select = "update trainer set points = points-$pociones where name = '$entrenador';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------------------

/*Con esta función llamamos a todos los datos de los pokemon en order descendente. copio y pego debajo 
 * "ordenada de mayor a menor por nivel y puntos de vida. Es decir, ordenado primero por
 *  nivel y en caso de empate por puntos de vida de mayor a menor"
 */
function todosPokemonOrdenDesc() {
    $con = conectar("stukemon");
    $select = "select * from pokemon order by level desc, life desc";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-----------------------------------------------------------------------------

//Función que nos devuelve todos los datos de los entrenadores, en orden descendente por los puntos
function todosEntrenadoresPuntosDesc() {
    $con = conectar("stukemon");
    $select = "select * from trainer order by points desc";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-------------------------------------------------------------------------

//Función que nos devuelve los ganadores en orden descendente
function ganadoresBatallas() {
    $con = conectar("stukemon");
    $select = "select winner, count(*) as ganado from battle group by winner order by ganado desc";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}


/*
//-------------------------Entrenadores con menos de 6 pokempn 

select trainer.name from trainer left join pokemon on trainer.name = trainer group by trainer.name having count(*)<6;


select name from trainer where name not in (select trainer from pokemon group by trainer having count(*)=6);

//------------------------Entrenadores con al menos un pokemon
 
 
select trainer.name, count(*) as cont from trainer right join pokemon on trainer.name = trainer group by trainer having cont>0;

select distinct trainer from pokemon;
 
 */