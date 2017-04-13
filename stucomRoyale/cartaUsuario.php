<?php

session_start();
if (isset($_SESSION["user"])) {

    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        require_once 'bbdd.php';

// Formulario para que escoja el jugador
        echo "<form action='cartaUsuario2.php' method='POST'>"; //haciendo esto es para que sea en la misma página
        echo "Selecciona el jugador: ";
        echo "<select name='player'>";
// Leemos los nombres de la bbdd
        $names = selectNombresJugadores();
// Vamos extrayendo los nombres y añadiendolos a la lista
        while ($fila = mysqli_fetch_array($names)) {
            extract($fila);
            echo "<option value='$username'>$username</option>";
        }
        echo "</select>";
        echo "<input type='submit' name='jugador' value='Seleccionar'>";
        echo "</form>";
    } else {
        echo "<h2>Acceso sólo para administradores.</h2>";
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
    }
} else {
    echo "<h2>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   