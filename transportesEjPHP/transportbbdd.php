<?php

/*
 * Fichero que incluirá todas las funciones relacionadas con la BBDD
 */

//Función que actualiza (modifica) los datos de un cnductor
function modificarConductor($dniactual, $dninuevo, $nombre, $telefono, $salario){
    $con=  conectar("transport");
    $update= "update truckdriver set name='$nombre', dni='$dninuevo', phone='$telefono', salary='$salario' where dni='$dniactual'";
    if(mysqli_query($con, $update)){
        echo"Conductor modificado";
    }else{
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Funcion que devuelve todos los datos de un conductor a partir de su dni
//que recibe como parámetro
function selectConductorByDNI($dni){
    $con=  conectar("transport");
    $select="select * from truckdriver where dni='$dni'";
    $resultado=  mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}


//Función que devuelve todos los datos de todos los cconductores
function selectAllConductores(){
    $con=conectar("transport");
    $select="select * from truckdriver";
    //ejecutamos la consulta y recogemos el resultado
    $resultado=  mysqli_query($con, $select);
    desconectar($con);
    //devolvemos el resultado
    return $resultado;
}

//Función que actualiza (modifica) los datos de una ciudad
function modificarCiudad($cpactual, $cpnuevo, $nombre){
    $con=  conectar("transport");
    $update= "update city set name='$nombre', postalcode='$cpnuevo' where postalcode='$cpactual'";
    if(mysqli_query($con, $update)){
        echo"Ciudad modificada";
    }else{
        echo mysqli_error($con);
    }
    desconectar($con);
}


//Funcion que devuelve todos los datos de una ciudad a partir de un codigo postal 
//que recibe como parámetro
function selectCiudadByCodigoPostal($codigopostal){
    $con=  conectar("transport");
    $select="select * from city where postalcode='$codigopostal'";
    $resultado=  mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}


//Función que inserta un conductor en la bbdd
//Recibe un como parámetro -----POR ACABAR
function insertarConductor($dniconductor, $nombre, $telefono, $salario){
    $con=  conectar("transport");
    $insert="insert into truckdriver values ('$dniconductor', '$nombre', '$telefono', '$salario')";
    //ejecutamos la consulta
    if(mysqli_query($con, $insert)){
        //si ha ido bien
        echo"Conductor dado de alta";
    }else{
        //Sino mostramos el error
        echo mysqli_error($con);
    }
    desconectar($con);
}


//Función que recibe un código postal y borra la ciudad de la bbdd que
//tenga ese código postal
function borrarCiudad($codigopostal){
    $con=conectar("transport");
    $delete="delete from city where postalcode='$codigopostal'";
    if(mysqli_query($con, $delete)){
        echo "Ciudad borrada";
    }else{
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Función que devuelve todos los datos de todas las ciudades
function selectAllCiudades(){
    $con=conectar("transport");
    $select="select * from city";
    //ejecutamos la consulta y recogemos el resultado
    $resultado=  mysqli_query($con, $select);
    desconectar($con);
    //devolvemos el resultado
    return $resultado;
}

//Función que inserta una ciudad en la bbdd
//Recibe un código postal y un nombre como parámetro
function insertarCiudad($codigopostal, $nombre){
    $con=  conectar("transport");
    $insert="insert into city values ('$codigopostal', '$nombre')";
    //ejecutamos la consulta
    if(mysqli_query($con, $insert)){
        //si ha ido bien
        echo"Ciudad dada de alta";
    }else{
        //Sino mostramos el error
        echo mysqli_error($con);
    }
    desconectar($con);
}

// Función para conectar con la BBDD
function conectar($database) {
    $conexion = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $conexion;
}
//-----------------------------------------------------------------


// Función que cierra la conexión con la bbdd
function desconectar($conexion) {
    mysqli_close($conexion);
}