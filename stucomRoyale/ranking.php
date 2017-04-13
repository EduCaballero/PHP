<?php
session_start();
if(isset($_SESSION["user"])){
    
$tipo = $_SESSION["tipo"];
if($tipo == 1){
require_once 'bbdd.php';

$topPlayers = playerOrderbyLevelDesc();

echo "<table>";
echo "<caption>Ranking</caption>";
echo "<tr>";
echo "<th> Username </th><th> Pass </th><th> Tipo </th><th> Victorias </th><th> Nivel </th>";
echo "</tr>";

while ($fila = mysqli_fetch_array($topPlayers)) {
    echo "<tr>";
    extract($fila);
    echo "<td> $username </td><td> $password </td><td> $type </td><td> $wins </td><td> $level </td>";
    echo "</tr>";
}
echo "</table>";
}else{
    echo "<h2>Acceso sólo para administradores.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
} else {
    echo "<h1>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   
