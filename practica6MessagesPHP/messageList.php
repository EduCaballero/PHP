<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
        if (isset($_GET["contador"])) {
            $contador = $_GET["contador"];
        } else {
            $contador = 0;
        }
        require_once 'bbdd.php';
        $total = allTotalMessages();
        $messages = allMessages($contador, 15);
        echo "<table border='1'>";
        echo "<caption>Todos los mensajes</caption>";
        echo "<tr>";
        echo "<th> Remitente </th><th> Receptor </th><th> Fecha/Hora </th><th> Asunto </th><th> Leído </th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_array($messages)) {
            echo "<tr>";
            echo "<td>" . $fila["sender"] . " </td><td>" . $fila["receiver"] . " </td><td>" . $fila["date"] . " </td><td>" . $fila["subject"] . "</td><td>" . $fila["read"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        if ($contador > 0) {
            echo "<a href='messageList.php?contador=" . ($contador - 15) . "'>Anterior </a>";
        }
        if (($contador + 15) <= $total) {
            echo "Mostrando de " . ($contador + 1) . " a " . ($contador + 15) . " de $total";
        } else {
            echo "Mostrando de " . ($contador + 1) . " a $total de $total";
        }
        if (($contador + 15) < $total) {
            echo "<a href='messageList.php?contador=" . ($contador + 15) . "'> Siguiente</a>";
        }
        echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
    } else {
        echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
    }
} else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
?>
