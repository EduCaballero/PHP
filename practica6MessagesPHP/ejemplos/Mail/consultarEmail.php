<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
require_once 'bbdd_user.php';
    
$user = $_SESSION["user"];
updateEvent($user, 'C');

if (isset($_GET["contador"])) {
            $contador = $_GET["contador"];
        } else {
            $contador = 0;
        }
        
        $total = totalEmails($user);
        
        $emails = emailsByUser($user, $contador, 10);

echo "<table border='1'>";
echo "<caption>Bandeja de Entrada</caption>";
echo "<tr>";
echo "<th> Emisor </th><th> Fecha </th><th> Asunto </th><th> Leido </th>";
echo "</tr>";
while ($fila = mysqli_fetch_array($emails)) {
    echo "<tr>";
    //extract($fila);
    //if($read=0)$leido = "No";
    //else $leido = "Si";
    echo '<form action="infoEmail.php" method="POST">';
    echo "<td>". $fila["sender"]." </td><td>". $fila["date"]." </td><td>". $fila["subject"]." </td><td>";
    if ($fila["read"]) {
        echo "SI";
    } else {
        echo "NO";
    }
            echo "</td><td><input type='submit' name='ver' value='Ver'></td>";
    echo "<input type='hidden' name='id' value='". $fila["idmessage"]."'>";
    echo "<input type='hidden' name='emisor' value='". $fila["sender"]."'>";
    echo "<input type='hidden' name='fecha' value='". $fila["date"]."'>";
    echo "<input type='hidden' name='asunto' value='". $fila["subject"]."'>";
    echo "<input type='hidden' name='leido' value='". $fila["read"]."'>";
    echo '</form>';
    echo "</tr>";
}
echo "</table>";

if ($contador > 0) {
            echo "<a href='consultarEmail.php?contador=".($contador-10)."'>Anterior </a>";
        }

        if (($contador + 10) <= $total) {
            echo "Mostrando de " . ($contador + 1) . " a " . ($contador + 10) . " de $total";
        } else {
            echo "Mostrando de " . ($contador + 1) . " a $total de $total";
        }
        
        if (($contador + 10) < $total) {
            echo "<a href='consultarEmail.php?contador=".($contador+10)."'> Siguiente</a>";
        }
        if ($_SESSION["tipo"] == 1) echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
        else echo '<form method="" action="home_user.php"> <button type="submit">Home</button> </form>';
}else{
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}

        }else{
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
?>