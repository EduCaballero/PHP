<?php

/* 
 *Fichero que se conecta a la bbdd e inserta los datos del alumno
 */

// Recibimos los datos del formulario (POST)

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$sexo = $_POST["sexo"];
$edad = $_POST["edad"];
$experiencia = $_POST["experiencia"];
$especialidad = $_POST["especialidad"];

// Conectamos a la bbdd, si no conecta interrumpe el programa
$conexion = mysqli_connect("localhost", "root", "", "restaurant") or // localhost, nombre usuario, pass, nombre de bbdd
        die ("No se ha podido conectar a la BBDD");

// Tenemos la conexión con la BBDD
// Preparamos el insert
$insert = "insert into cocinero values('$nombre', '$telefono', '$sexo', '$edad', '$experiencia', '$especialidad');";

if (mysqli_query($conexion, $insert)) {
    //Ha ido todo bien
    echo "Cocinero dado de alta<br>";
} else {
    //Si hay error lo mostramos por pantalla
    echo mysqli_error($conexion);
}