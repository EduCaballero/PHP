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
//Mostrar cartas y sus valores
function cardTable($user){
    $con = conectar("royal");
    
}

//-----------------------------------------------------------------

// Función que cierra la conexión con la bbdd
function desconectar ($conexion){
    mysqli_close($conexion); //se llama conexión pero se puede llamar como quiera. Lo que hay dentro de una función muere ahí, no sale
}

//-----------------------------------------------------------------

// Función que comprueba si un email ya existe en la bbdd
// Devuelve true si existe, false si no existe
function existUser($usuario) {
    $con = conectar("royal");
    $query = "select username from user where username='$usuario'";
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

//-----------------------------------------------------------------

// Función que inserta un usuario en la bbdd (type: user)
function insertUser($userName, $pass) {
    $con = conectar("royal");
    $insert = "insert into user values 
             ('$userName', '$pass', 0, 0, 1)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado </p>";
        echo'<form action="index.php" method="POST">'
                . '<input type="submit" value="Volver">'
                        . '</form>';
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
} 


//-----------------------------------------------------------------
//Función para recoger el nombre de todas las cartas

function getAllCards(){
    $con = conectar("royal");
    $select = "SELECT name FROM card";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-----------------------------------------------------------------

function newCardLevel($userName, $cardname){
    $con = conectar("royal");
    $select = "UPDATE deck SET level = level + 1 WHERE user = '$userName' AND card = '$cardname';";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//---------------------------------------------------------------
//Función que añade una carta
//function addCard($user, $card){
    


//-----------------------------------------------------------------

//Función para regalo de las 3 primeras cartas cuando se registra un usuario(escogidas random)
function regalo($userName){
    $con = conectar("royal");
    for ($i=0;$i<3;$i++){
        //$select = "SELECT name FROM royal.card order by rand() limit 1;";--NO FUNCIONA Y NO SÉ POR QUÉ :s
        //$arrayCartas = getAllCardsPlayerArray();
        $cards= getAllCardsArray();
        $actuales=getNCardsUser($userName);
        if($actuales==0){
            $cardgiven = rand(0, getNCards()-1);
            $insert="insert into deck values('$userName', '$cards[$cardgiven]', 1)";
            mysqli_query($con, $insert);
        }else{
            $cardgiven = rand(0, getNCards()-1);
            if(insertNewCard($cards[$cardgiven], $userName)){
                
            }else{
                mysqli_query($con, "UPDATE deck SET level = level + 1 WHERE user = '$userName' AND card = '$cards[$cardgiven]';");
            }
            /*$insert="insert into deck values('$userName', '$cards[$cardgiven]', 1)";
            if (mysqli_query($con, $insert)){
                mysqli_query($con, $insert);
                return 1;
            }else{
                mysqli_query($con, "UPDATE deck SET level = level + 1 WHERE user = '$userName' AND card = '$cards[$cardgiven]';");
                return 0;
            }*/
            
            /*foreach ($arrayCartas as $arrayCartasActual) {
            if($arrayCartasActual==$cards[$cardgiven]){
                mysqli_query($con, "UPDATE deck SET level = level + 1 WHERE user = '$userName' AND card = '$arrayCartasActual';");
            }else{
                $insert="insert into deck values('$userName', '$cards[$cardgiven]', 1)";
                mysqli_query($con, $insert);
            }
        }*/
        }
    }
    desconectar($con);
}


function insertNewCard($card, $userName)
{
    $con = conectar("royal");
    $insert = "INSERT INTO deck VALUES('$userName', '$card', 1);";
    if(mysqli_query($con, $insert))
    {
        desconectar($con);
        return 1;
    }
    desconectar($con);
    return 0;
}
//------------------------------------------------------------------
//Función para mostrar los datos de las cartas
function showPlayerCards($userName){
    $cards = array();
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT card FROM deck WHERE user = '$userName';");
    while($row = mysqli_fetch_row($res)){
        $cards[] = $row[0];
    }
    desconectar($con);
    return $cards;
}

//------------------------------------------------------------------
// Devuelve la información de una carta en forma de array
function getCardInfo($cardname)
{
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT * FROM card WHERE name = '$cardname';");
    desconectar($con);
    return mysqli_fetch_assoc($res);
}

function cartasJug($userName){
    $con = conectar("royal");
   // $userName='user1';
    $z="SELECT * FROM deck WHERE user = '$userName'";
    $res = mysqli_query($con, $z);
    desconectar($con);
    return $res;
}

//-----------------------------------------------------------------
//Función para recoger el nivel de una carta determinada de un usuario determinado
function getLevel($userName, $cardname){
    $con = conectar("royal");
    $select = "SELECT level FROM deck WHERE user = '$userName' AND card = '$cardname'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

/*function newLevel($updateLevel, $userName, $cardname){
    $con = conectar("royal");
    $select = "update deck set level='$updateLevel' where user='$userName' AND card='$cardname'";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}*/

//-----------------------------------------------------------------
//// Devuelve todos los nombres de las cartas de la BBDD en formato array
function getAllCardsArray(){
    $cards = array();
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT name FROM card;");
    while($row = mysqli_fetch_row($res)){
        $cards[] = $row[0];
    }
    desconectar($con);
    return $cards;
}


//-----------------------------------------------------------------
//// Devuelve todos los nombres de las cartas de UN jugador en formato array
function getAllCardsPlayerArray(){
    $cards = array();
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT card FROM deck;");
    while($row = mysqli_fetch_row($res)){
        $cards[] = $row[0];
    }
    desconectar($con);
    return $cards;
}


//-----------------------------------------------------------------
// Devuelve el numero de cartas disponibles
function getNCards()
{
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT name FROM card;");
    desconectar($con);
    return mysqli_num_rows($res);
}

// Devuelve el numero de cartas disponibles de un usuario concreto
function getNCardsUser($user)
{
    $con = conectar("royal");
    $res = mysqli_query($con, "SELECT card FROM deck WHERE user='$user';");
    desconectar($con);
    return mysqli_num_rows($res);
}

//-----------------------------------------------------------------
//Función para validar el usuario
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

//-----------------------------------------------------------------
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

//-----------------------------------------------------------------
//Función que nos devuelve el password del usuario que queramos
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

//-----------------------------------------------------------------
//Función que nos permite modificar el pass (hacer un update al campo pass de la bbdd)
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


//-----------------------------------------------------------------
function datosUsuario($usuario) {
    $con = conectar("royal");
    $select = "select * from user where username='$usuario'";
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    return $resultado;
}

//-----------------------------------------------------------------
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

//-----------------------------------------------------------------
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

//-----------------------------------------------------------------
//Función que nos devuelve todos los datos de los jugadores, en orden descendente por nivel y, en caso de empate, por victorias
function playerOrderbyLevelDesc() {
    $con = conectar("royal");
    $select = "select * from user order by level desc, wins desc";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//-----------------------------------------------------------------
// Función que a partir del nombre de un jugador
// devuelve todos sus datos
function selectJugadorborrar($name) {
    $con = conectar("royal");
    $query = "delete from user where username='$name';";
    if(mysqli_query($con, $query)) echo "Entrada borrada<br>";
    else echo mysqli_error($con);
    desconectar($con);
}

//------------------------------------------------------------------------------

// Función que devuelve los nombres de todos los jugadores
function selectNombresJugadores() {
    $con = conectar("royal");
    $query = "select name from user;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}


//-----------------------------------------------------------------------------

// Función que conecta a la bbdd y devuelve 
// el resultado de ejecutar select * from card
function selectAllCards() {
    // conectamos con la bbdd
    $con = conectar("royal");
    // Ejecutamos la consulta recogiendo el resultado
    $resultado = mysqli_query($con, "select * from card");
    desconectar($con);
    return $resultado;
}