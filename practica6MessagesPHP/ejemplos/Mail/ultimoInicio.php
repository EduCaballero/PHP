<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
require_once 'bbdd_user.php';

if (isset($_POST['estado'])) {
    $usuario = $_POST['usuario'];
    $fecha = getLastConection($usuario);
     
        while ($fila = mysqli_fetch_array($fecha)) {
        extract($fila);
    echo "Ultimo inicio de sesion de $usuario a las $date";
        }
    echo '<br><form method="" action="home  _admin.php"> <button type="submit">Home</button> </form>';
     
} else {
    echo "<form action='' method='POST'>";
    echo "Escoge el usuario para saber su ultimo inicio: ";
    echo "<select name='usuario'>";
    $usuarios = selectAllUsers();
    while ($fila = mysqli_fetch_array($usuarios)) {
        extract($fila);
        echo "<option value='$username'>$username";
        echo "</option>";
    }
    echo "</select>";
    echo "<input type='submit' name='estado' value='Estado'>";
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