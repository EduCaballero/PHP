<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';

        if (isset($_POST['login'])) {
            $usuario = $_POST['usuario'];
            $fecha = getLastConection($usuario);
            while ($fila = mysqli_fetch_array($fecha)) {
                extract($fila);
                echo "El último inicio de sesion de $usuario ha sido a las $date";
            }
            echo '<br><form method="" action="homeAdmin.php"><button type="submit">Volver</button> </form>';
        } else {
            echo "<form action='' method='POST'>";
            echo "Escoge de quién deseas saber su ultimo inicio: ";
            echo "<select name='usuario'>";
            $usuarios = selectAllUsers();
            while ($fila = mysqli_fetch_array($usuarios)) {
                extract($fila);
                echo "<option value='$username'>$username";
                echo "</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='login' value='Último inicio'>";
            echo "</form>";
        }
    } else {
        echo "<h1>Sólo los admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>