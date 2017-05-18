<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
require_once 'bbdd_user.php';

$ranking = ranking();
echo "<table border='1'>";
echo "<caption>Ranking de los que mas emails envian</caption>";
echo "<tr>";
echo "<th> Nombre </th><th> Emails </th>";
echo "</tr>";
while ($fila = mysqli_fetch_array($ranking)) {
    echo "<tr>";
    echo "<td>". $fila["sender"]." </td><td>". $fila["cont"]." </td>";
    echo "</tr>";
}
echo "</table>";

}else{
    echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}

        }else{
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
?>

