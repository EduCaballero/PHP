<?php
session_start();
if (isset($_SESSION["user"])) {

    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Homepage del Administrator</title>
            </head>
            <body>
                <?php
                echo '<form method="" action="altaCartas.php"> <button type="submit">Dar de alta nuevas cartas</button> </form>';
                echo '<form method="" action="ranking.php"> <button type="submit">Ranking</button> </form>';
                echo '<form method="" action="borrarUsuario.php"> <button type="submit">Borrar usuario</button> </form>';
                echo '<form method="" action="cartaUsuario.php"> <button type="submit">Otorgas cartas a usuarios</button> </form>'
                ?>
            </body>
        </html>
        <?php
    } else {
        echo "<h2>Acceso sólo para administradores.</h2>";
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
    }
} else {
    echo "<h2>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
?>