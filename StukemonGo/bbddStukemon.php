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
// Inserta un Pokemon con los valores que recibe como parámetros
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
    $query = "select name from trainer"
            . ";";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//------------------------------------------------------------------