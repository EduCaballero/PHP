<?php

require_once 'bbdd.php';

function mirarNombre($nombre){
    $con = conectar("royal");
    $query = "select name from card where name='$nombre'";
    $resultado = mysqli_query($con, $query);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    
    if ($nombre == $name){
        return true;
    } else {
        return false;
    }
}

function insertarCarta($nombre, $tipo, $calidad, $vida, $danyo, $elixir){
     $con = conectar("royal");
    $insert = "insert into card values ('$nombre', '$tipo', '$calidad', '$vida','$danyo','$elixir')";
  
    if (mysqli_query($con, $insert)) {
        echo "<h2>Carta dada de alta.</h2>";
        echo '<form method="" action="home_admin.php"> <button type="submit">Inicio</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function datosUsuario($usuario) {
    $con = conectar("royal");
    $select = "select * from user where username='$usuario'";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function modificarPass($usuario, $pass) {
    $con = conectar("royal");
    $update = "update user set password='$pass' where username='$usuario'";
    if (mysqli_query($con, $update)) {
        echo "<h1>Contraseña modificada.</h1>";
        echo '<img src="img/Happy_Face.png" style="width:350px;height: 300px;"/>';
        echo '<form method="" action="home_user.php"> <button type="submit">Ir a tu pagina</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function verPass($usuario,$passOld) {
    $con = conectar("royal");
    $query = "select password from user where username='$usuario'";
    $resultado = mysqli_query($con, $query);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    
    if ($password == $passOld) {
        return true;
    } else {
        return false;
    }
}

function getTypeByUser($user) {
    $con = conectar("royal");
    $query = "select type from user where username='$user'";
    // Ejecutamos la consulta
    $resultado = mysqli_query($con, $query);
    // Extraemos el resultado
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);

    return $type;
}

function validateUser($user, $pass) {
    $con = conectar("royal");
    $query = "select * from user where username='$user' 
            and password='$pass'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    desconectar($con);
 
    if ($filas > 0) {
        return true;
    } else { 
        return false;
    }
}

function insertUser($usuario, $pass) {
    $con = conectar("royal");
    $insert = "insert into user values ('$usuario', '$pass', '0', '0','1')";
  
    if (mysqli_query($con, $insert)) {
        echo "<h1>Usuario dado de alta.</h1>";
        echo '<img src="img/Happy_Face.png" style="width:350px;height: 300px;"/>';
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
        echo '<form method="" action="login.php"> <button type="submit">Login</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function existUser($usuario) {
    $con = conectar("royal");
    $query = "select username from user where username='$usuario'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $num_rows = mysqli_num_rows($resultado);

    if ($num_rows == 0) {
        return false;
    } else {
        return true;
    }
}
?>
