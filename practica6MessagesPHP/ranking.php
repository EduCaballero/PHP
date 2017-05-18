<?php

session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';
        $ranking = ranking();
        echo "<table border='1'>";
        echo "<caption>Ranking de los usuarios/admin con mayor número de mensajes (orden descendiente)</caption>";
        echo "<tr>";
        echo "<th> Usuario/admin </th><th> Mensajes </th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_array($ranking)) {
            echo "<tr>";
            echo "<td>" . $fila["sender"] . " </td><td>" . $fila["cont"] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<form action='homeAdmin.php'> <button type='submit'>Volver</button> </form>";
    } else {
        echo "<h1>Sólo los admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>

