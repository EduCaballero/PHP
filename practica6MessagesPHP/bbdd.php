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

// Función que comprueba si un email ya existe en la bbdd
// Devuelve true si existe, false si no existe
function existUser($username) {
    $con = conectar("msg");
    $query = "select username from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    // Comprobamos si la consulta ha devuelto algún resultado
    $num_rows = mysqli_num_rows($resultado);
    // Si el nº de filas es 0, no existe el usuario
    if ($num_rows == 0) {
        return false;
    } else { // este else no hace falta
        return true;
    }
}

//---------------------------------------------------------

// Función que inserta un usuario en la bbdd (type: user)
function insertUser($username, $pass, $nombre, $apellido) {
    $con = conectar("msg");
    $passCif = password_hash($pass, PASSWORD_DEFAULT);
    $insert = "insert into user values 
             ('$username', '$passCif', '$nombre', '$apellido', 0)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado </p>";
        echo "<form action='index.php'> <button type='submit'>Inicio</button> </form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
} 

//--------------------------------------------------------

//función para validar el usuario y hacer login

function validateUser($username, $pass) {
    $con = conectar("msg");
    $query = "select password from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    desconectar($con);
    if ($filas > 0) {
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
        return password_verify($pass, $password);
    } else {
        return false;
    }
}

//--------------------------------------------------------

function getTypeByUsername($username) {
    $con = conectar("msg");
    $query = "select type from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}

//-------------------------------------------------------

function updateEvent($username, $typeEvent){
    $con = conectar("msg");
    $insert = "insert into event values (null, '$username', now(), '$typeEvent')";
    if (mysqli_query($con, $insert)) {
         
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//-----------------------------------------------------

function modificarPass($usuario, $pass) {
    $con = conectar("msg");
    $passCif = password_hash($pass, PASSWORD_DEFAULT);
    $update = "update user set password='$passCif' where username='$usuario'";
    if (mysqli_query($con, $update)) {
        echo "<h1>Contraseña modificada correctamente</h1>";
        if ($_SESSION["tipo"] == 1)
            echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
        else
            echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//-------------------------------------------

function selectUsuarios() {
    $con = conectar("msg");
    $query = "select username from user";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//------------------------------------------

function enviarMensaje($user, $contacto, $asunto, $mensaje, $tipo) {
    $con = conectar("msg");
    $insert = "insert into message values (null, '$user', '$contacto', now(), 0, '$asunto', '$mensaje')";
    if (mysqli_query($con, $insert)) {
        echo 'Mensaje enviado correctamente';
        echo '<br>';
        if ($tipo == 1) echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
        else echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button> </form>';
    } else {
        echo 'Mensaje no se ha enviado correctamente';
        echo mysqli_error($con);
    }
    desconectar($con);
}

//-------------------------------------------

function totalMensajes($user) {
    $con = conectar("msg");
    $select = "select count(*) as cont from message where receiver = '$user'";
    $resultado = mysqli_query($con, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $cont;
}

//-------------------------------------------

function mensajesByUser($user, $posicion, $cantidad) {
    $con = conectar("msg");
    $select = "select * from message where receiver='$user' order by date desc limit $posicion, $cantidad";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//--------------------------------------------

function updateread($id){
    $con = conectar("msg");
    $update = "update message set message.read=true where idmessage = $id";
    if (mysqli_query($con, $update)) {
       
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//--------------------------------------------

function selectMessage($id) {
    $con = conectar("msg");
    $select = "select * from message where idmessage='$id'";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//----------------------------------------

function selectAllUsers(){
    $con = conectar("msg");
    $select = "select * from user";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//---------------------------------------------

function insertUserByAdmin($username, $pass, $name, $surname, $tipo) {
    $con = conectar("msg");
    $passCif = password_hash($pass, PASSWORD_DEFAULT);
    $insert = "insert into user values 
             ('$username', '$passCif', '$name', '$surname', $tipo)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado correctamente </p>";
        echo "<form action='homeAdmin.php'> <button type='submit'>Volver</button> </form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//----------------------------------------------

function borrarUsuario($username) {
    $con = conectar("msg");
    $delete = "delete from user where username='$username'";
    if (mysqli_query($con, $delete)) {
        echo "Usuario eliminado.";
        echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//---------------------------------------------------

function allTotalMessages() {
    $con = conectar("msg");
    $select = "select count(*) as cont from message";
    $resultado = mysqli_query($con, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $cont;
}

//-------------------------------------------------

function allMessages($posicion, $cantidad) {
    $con = conectar("msg");
    $select = "select * from message order by date desc limit $posicion, $cantidad";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//-----------------------------------------------

function getLastConection($usuario) {
    $con = conectar("msg");
    $select = "select date from event where user='$usuario' and type='I' order by date desc limit 1";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//----------------------------------------------

function ranking(){
    $con = conectar("msg");
    $select = "select sender , count(*) as cont from message group by sender order by count(*) desc";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}