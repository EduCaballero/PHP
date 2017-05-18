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

        require_once 'bbdd_user.php';


        updateLeido($id);

        $emails = selectInfoEmail($id);
        while ($fila = mysqli_fetch_array($emails)) {

            echo "Mensaje de $emisor </br>";
            echo "Fecha: $fecha </br>";
            echo "-------------------- </br>";
            echo "Asunto: $asunto </br>";
            echo 'Mensaje: ' . $fila["body"];

            echo '<br><form method="" action="consultarEmail.php"> <button type="submit">Emails</button> </form>';
        }
    } else {
        echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
    }
} else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}