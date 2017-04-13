<?php
session_start();
if(isset($_SESSION["user"])){
    
$tipo = $_SESSION["tipo"];
if($tipo == 1){
require_once 'bbdd.php';

if(isset($_POST['borrar'])){
   $name=$_POST['player'];
    selectJugadorborrar($name); 
}

else{
// Formulario para que escoja el jugador
echo "<form action='' method='post'>"; //haciendo esto es para que sea en la misma página
echo "Selecciona el jugador a borrar: ";
echo "<select name='player'>";
// Leemos los nombres de la bbdd
$names = selectNombresJugadores();
// Vamos extrayendo los nombres y añadiendolos a la lista
while ($fila = mysqli_fetch_array($names)) {
    extract($fila);
    echo "<option value='$username'>$username</option>";
}
echo "</select>";
echo "<input type='submit' name='borrar' value='Seleccionar'>";
echo "</form>";
}


}else{
    echo "<h2>Acceso sólo para administradores.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
} else {
    echo "<h1>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   
