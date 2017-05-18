<?php

session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
        $user = $_SESSION["user"];
        $id = $_POST['id'];
        $emisor = $_POST['emisor'];
        $fecha = $_POST['fecha'];
        $asunto = $_POST['asunto'];
        $leido = $_POST['leido'];
        require_once 'bbdd.php';
        updateread($id);
        $emails = selectMessage($id);
        while ($fila = mysqli_fetch_array($emails)) {

            echo "Mensaje de $emisor </br>";
            echo "Fecha: $fecha </br>";
            echo "-------------------------</br>";
            echo "Asunto: $asunto </br>";
            echo 'Mensaje: ' . $fila["body"];

            echo '<br><form method="" action="receivedMessages.php"> <button type="submit">Volver</button> </form>';
        }
    } else {
        echo "<h1>Sólo los usuarios/admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button></form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button></form>';
}