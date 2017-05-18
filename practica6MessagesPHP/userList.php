<?php

// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
    if ($_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';
        $usuarios = selectAllUsers();
        echo "<table border='1'>";
        echo "<caption>Listado de usuarios</caption>";
        echo "<tr>";
        echo "<th> Username </th><th> Nombre </th><th> Apellidos </th><th> Tipo </th>";
        echo "</tr>";
        while ($fila = mysqli_fetch_array($usuarios)) {
            echo "<tr>";
            echo "<td>" . $fila["username"] . " </td><td>" . $fila["name"] . " </td><td>" . $fila["surname"] . " </td><td>" . $fila["type"] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
    } else {
        echo "<h1>Sólo los admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>