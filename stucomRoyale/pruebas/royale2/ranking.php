<?php
session_start();
if(isset($_SESSION["user"])){
    
$tipo = $_SESSION["tipo"];
if($tipo == 1){
require_once 'transportbbdd.php';

$topPlayers = selectTopPlayers();

echo "<table>";
echo "<caption>Listado de los 10 mejores </caption>";
echo "<tr>";
echo "<th> Nombre </th><th> Telefono </th><th> Sueldo </th><th> Matricula </th><th> Modelo </th>";
echo "</tr>";

while ($fila = mysqli_fetch_array($topPlayers)) {
    echo "<tr>";
    extract($fila);
    echo "<td> $name </td><td> $phone </td><td> $salary </td><td> $idtruck </td><td> $model </td>";
    echo "</tr>";
}
echo "</table>";
}else{
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>No puedes aceder a esta pagina si no eres administrador.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
} else {
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>No hay usuario valido.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   
