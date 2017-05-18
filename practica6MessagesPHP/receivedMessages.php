<?php

//Página para leer los mensajes recibidos
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';

        $user = $_SESSION["user"];
        updateEvent($user, 'C');

        if (isset($_GET["contador"])) {
            $contador = $_GET["contador"];
        } else {
            $contador = 0;
        }

        $total = totalMensajes($user);
        $mensajes = mensajesByUser($user, $contador, 10);

        echo "<table border='1'>
        <caption>Mensajes entrantes</caption>
        <tr>
        <th> Remitente </th><th> Fecha/Hora </th><th> Asunto </th><th> Leído </th>
        </tr>";
        while ($fila = mysqli_fetch_array($mensajes)) {
            echo "<tr>";
            echo '<form action="infoMessage.php" method="POST">';
            echo "<td>" . $fila["sender"] . " </td><td>" . $fila["date"] . " </td><td>" . $fila["subject"] . " </td><td>";
            if ($fila["read"]) {
                echo "SÍ";
            } else {
                echo "NO";
            }
            echo "</td><td><input type='submit' name='ver' value='Ver'></td>
            <input type='hidden' name='id' value='" . $fila["idmessage"] . "'>
            <input type='hidden' name='emisor' value='" . $fila["sender"] . "'>
            <input type='hidden' name='fecha' value='" . $fila["date"] . "'>
            <input type='hidden' name='asunto' value='" . $fila["subject"] . "'>
            <input type='hidden' name='leido' value='" . $fila["read"] . "'>
            </form>
            </tr>";
        }
        echo "</table>";

        if ($contador > 0) {
            echo "<a href='receivedMessages.php?contador=" . ($contador - 10) . "'>Anterior </a>";
        }

        if (($contador + 10) <= $total) {
            echo "Mostrando del " . ($contador + 1) . " al " . ($contador + 10) . " de $total mensajes";
        } else {
            echo "Mostrando de " . ($contador + 1) . " a $total de $total";
        }

        if (($contador + 10) < $total) {
            echo "<a href='receivedMessages.php?contador=" . ($contador + 10) . "'>   Siguiente</a>";
        }
        if ($_SESSION["tipo"] == 1)
            echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button></form>';
        else
            echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button></form>';
    }else {
        echo "<h1>Sólo los usuarios pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button></form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button></form>';
}
?>