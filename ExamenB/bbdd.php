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


// Función que llama clientes
function llamoClientes() {
    $con = conectar("catering");
    $select = "select nif, nombre, apellidos from cliente";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------

// Función que llama platos
function llamoPlatos() {
    $con = conectar("catering");
    $select = "select * from plato";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------

// Función que inserta un pedido en la bbdd
function insertarPedido($cliente, $plato, $cantidad) {
    $con = conectar("catering");
    $insert = "insert into pedir values (null, '$cliente', '$plato', '$cantidad')";
    // Ejecutamos la consulta
    if (mysqli_query($con, $insert)) {
        // Si ha ido bien
        echo "Pedido dado de alta.";
    } else {
        // Sino mostramos el error
        echo mysqli_error($con);
    }
    desconectar($con);
}

//-------------------------------------------------------------------

// Función que modifica los datos del jugador (Excepto el nombre, 
// pq es primary key)
function modificarPrecio($idplato, $precio) {
    $con = conectar("catering");
    $update = "update plato set precio=(precio+$precio) where idplato=$idplato";
    if (mysqli_query($con, $update)) {
        echo "Precio modificado";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//-----------------------------------------------------------------------------

function listaCocineros() {
    $con = conectar("catering");
    $select = "select * from cocinero order by contrato, apellidos, nombre";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-----------------------------------------------------------------------------

// Función que llama cocineros
function llamoCocineros() {
    $con = conectar("catering");
    $select = "select * from cocinero";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//------------------------------------------------------------------

// Función que a partir del nombre de un cocinero
// devuelve todos sus datos
function selectCocineroBorrar($dni) {
    $con = conectar("catering");
    $query = "delete from cocinero where dni='$dni';";
    if(mysqli_query($con, $query)) echo "Cocinero despedido<br>";
    else echo mysqli_error($con);
    desconectar($con);
}

//-----------------------------------------------------------------------------