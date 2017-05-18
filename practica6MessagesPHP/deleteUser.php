<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';
        if (isset($_POST['borrar'])) {
            $usuario = $_POST['usuario'];
            borrarUsuario($usuario);
        } else {
            echo "<form action='' method='POST'>";
            echo "Escoge el usuario que desees eliminar: ";
            echo "<select name='usuario'>";
            $usuarios = selectAllUsers();
            while ($fila = mysqli_fetch_array($usuarios)) {
                extract($fila);
                echo "<option value='$username'>$username";
                echo "</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='borrar' value='Eliminar'>";
            echo "</form>";
        }
    }else{
        echo "<h1>Sólo los admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
}else{
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>

