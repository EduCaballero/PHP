<?php

/* 
 *Fichero que se conecta a la bbdd e inserta los datos del alumno
 */

// Recibimos los datos del formulario (POST)

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$ciudad = $_POST["ciudad"];
$telefono = $_POST["telefono"];
$sexo = $_POST["sexo"];

// Conectamos a la bbdd, si no conecta interrumpe el programa
$conexion = mysqli_connect("localhost", "root", "", "escuela") or
        die ("No se ha podido conectar a la BBDD");

// Tenemos la conexión con la BBDD
// Preparamos el insert
$insert = "insert into alumno values('$nombre', '$edad', '$ciudad', '$telefono', '$sexo');";

if (mysqli_query($conexion, $insert)) {
    //Ha ido todo bien
    echo "Alumno dado de alta<br>";
} else {
    //Si hay error lo mostramos por pantalla
    echo mysqli_error($conexion);
}

//postres entrantes plato principal
// la edad debe estar enrtre 18 y 65
//experiencia entre 0 y 60
//sexo debe ser un radio