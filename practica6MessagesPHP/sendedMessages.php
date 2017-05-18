<?php

session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';
        $user = $_SESSION["user"];

        if (isset($_GET["contador"])) {
            $contador = $_GET["contador"];
        } else {
            $contador = 0;
        }
        $total = totalMensajes($user);
        $mensajes = mensajesByUser($user, $contador, 10);
        echo "<table border='1'>";
        echo "<caption>Mensajes enviados</caption>";
        echo "<tr>";
        echo "<th> Receptor </th><th> Fecha/Hora </th><th> Asunto </th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_array($mensajes)) {
            echo "<tr>";
            echo "<td>" . $fila["receiver"] . " </td><td>" . $fila["date"] . " </td><td>" . $fila["subject"] . " </td>";
            echo "</tr>";
        }
        echo "</table>";

        if ($contador > 0) {
            echo "<a href='sendedMessages.php?contador=" . ($contador - 10) . "'>Anterior </a>";
        }
        if (($contador + 10) <= $total) {
            echo "Mostrando de " . ($contador + 1) . " a " . ($contador + 10) . " de $total";
        } else {
            echo "Mostrando de " . ($contador + 1) . " a $total de $total";
        }
        if (($contador + 10) < $total) {
            echo "<a href='sendedMessages.php?contador=" . ($contador + 10) . "'> Siguiente</a>";
        }
        if ($_SESSION["tipo"] == 1)
            echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
        else
            echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button> </form>';
    }else {
        echo "<h1>Sólo los usuarios pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>