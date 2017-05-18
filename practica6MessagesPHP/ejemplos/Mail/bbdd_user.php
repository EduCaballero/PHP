    <?php

require_once 'bbdd.php';

function ranking(){
    $con = conectar("msg");
    $select = "select * , count(*) as cont from message group by sender order by count(*) desc";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function getLastConection($usuario) {
    $con = conectar("msg");
    $select = "select date from event where user='$usuario' and type='I' order by date desc limit 1";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function allTotalEmails() {
    $con = conectar("msg");
    $select = "select count(*) as cont from message";
    $resultado = mysqli_query($con, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $cont;
}

function allEmails($posicion, $cantidad) {
    $con = conectar("msg");
    $select = "select * from message order by date desc limit $posicion, $cantidad";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function borrarUsuario($username) {
    $con = conectar("msg");
    $delete = "delete from user where username='$username'";
    if (mysqli_query($con, $delete)) {
        echo "Usuario borrado.";
        echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertUserByAdmin($username, $pass, $name, $surname, $tipo) {
    $con = conectar("msg");
    $passCif = password_hash($pass, PASSWORD_DEFAULT);
    $insert = "insert into user values 
             ('$username', '$passCif', '$name', '$surname', $tipo)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado </p>";
        echo "<form action='home_admin.php'> <button type='submit'>Home</button> </form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function selectAllUsers(){
    $con = conectar("msg");
    $select = "select * from user";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function totalEmailsSend($user) {
    $con = conectar("msg");
    $select = "select count(*) as cont from message where sender = '$user'";
    $resultado = mysqli_query($con, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $cont;
}

function emailsSendByUser($user, $posicion, $cantidad) {
    $con = conectar("msg");
    $select = "select * from message where sender='$user' order by date desc limit $posicion, $cantidad";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function totalEmails($user) {
    $con = conectar("msg");
    $select = "select count(*) as cont from message where receiver = '$user'";
    $resultado = mysqli_query($con, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $cont;
}

function updateLeido($id){
    $con = conectar("msg");
    $update = "update message set message.read=true where idmessage = $id";
    if (mysqli_query($con, $update)) {
       
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function selectInfoEmail($id) {
    $con = conectar("msg");
    $select = "select * from message where idmessage='$id'";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function emailsByUser($user, $posicion, $cantidad) {
    $con = conectar("msg");
    $select = "select * from message where receiver='$user' order by date desc limit $posicion, $cantidad";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

function updateEventR($username){
    $con = conectar("msg");
    $insert = "insert into event values (null, '$username', now(), 'R')";
    if (mysqli_query($con, $insert)) {
       
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function enviarMensaje($user, $contacto, $asunto, $mensaje, $tipo) {
    $con = conectar("msg");
    $insert = "insert into message values (null, '$user', '$contacto', now(), 0, '$asunto', '$mensaje')";
    if (mysqli_query($con, $insert)) {
        echo 'Mensaje enviado correctamente';
        echo '<br>';
        if ($tipo == 1) echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
        else echo '<form method="" action="home_user.php"> <button type="submit">Home</button> </form>';
    } else {
        echo 'Mensaje no se ha enviado correctamente';
        echo mysqli_error($con);
    }
    desconectar($con);
}

function selectUsuarios() {
    $con = conectar("msg");
    $query = "select username from user";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function modificarPass($usuario, $pass) {
    $con = conectar("msg");
    $update = "update user set password='$pass' where username='$usuario'";
    if (mysqli_query($con, $update)) {
        echo "<h1>Contraseña modificada.</h1>";
        echo '<form method="" action="home_user.php"> <button type="submit">Home</button> </form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function verPass($usuario,$passOld) {
    $con = conectar("msg");
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

function updateEvent($username, $typeEvent){
    $con = conectar("msg");
    $insert = "insert into event values (null, '$username', now(), '$typeEvent')";
    if (mysqli_query($con, $insert)) {
         
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertUser($username, $pass, $name, $surname) {
    $con = conectar("msg");
    $passCif = password_hash($pass, PASSWORD_DEFAULT);
    $insert = "insert into user values 
             ('$username', '$passCif', '$name', '$surname', 0)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado </p>";
        echo "<form action='index.php'> <button type='submit'>Inicio</button> </form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
} 

function existUser($username) {
    $con = conectar("msg");
    $query = "select username from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $num_rows = mysqli_num_rows($resultado);
    if ($num_rows == 0) {
        return false;
    } else {
        return true;
    }
}

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

function getTypeByUsername($username) {
    $con = conectar("msg");
    $query = "select type from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($con);
    return $type;
}

?>
