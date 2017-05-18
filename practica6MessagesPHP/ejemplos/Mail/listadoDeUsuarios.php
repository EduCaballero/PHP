<?php
// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
     if ($_SESSION["tipo"] == 1) {
         
        require_once 'bbdd_user.php';
    
        $usuarios = selectAllUsers();
        
        echo "<table border='1'>";
echo "<caption>Lista de Usuarios</caption>";
echo "<tr>";
echo "<th> Username </th><th> Nombre </th><th> Apellidos </th><th> Tipo </th>";
echo "</tr>";
while ($fila = mysqli_fetch_array($usuarios)) {
    echo "<tr>";
    echo "<td>". $fila["username"]." </td><td>". $fila["name"]." </td><td>". $fila["surname"]." </td><td>". $fila["type"]." </td>";
    echo "</tr>";
}
echo "</table>";
echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
     
     }else {
    echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     } else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     ?>