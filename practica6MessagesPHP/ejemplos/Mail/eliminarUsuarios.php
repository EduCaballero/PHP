<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
require_once 'bbdd_user.php';

if (isset($_POST['borrar'])) {
    $usuario = $_POST['usuario'];
    borrarUsuario($usuario);
} else {
    echo "<form action='' method='POST'>";
    echo "Escoge el conductor que quieras borrar: ";
    echo "<select name='usuario'>";

    $usuarios = selectAllUsers();
    while ($fila = mysqli_fetch_array($usuarios)) {
        extract($fila);
        echo "<option value='$username'>$username";
        echo "</option>";
    }
    echo "</select>";
    echo "<input type='submit' name='borrar' value='Borrar'>";
    echo "</form>";
}

}else{
    echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}

        }else{
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
?>

