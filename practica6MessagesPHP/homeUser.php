<?php
// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
    if ($_SESSION["tipo"] == 0) {
        ?>

        <html>
            <head>
                <meta charset="UTF-8">
                <link href="style3.css" rel="stylesheet" type="text/css"/>
                <title>Página de inicio del Usuario</title>
            </head>
            <body>
                <h1>Página de inicio de <?php echo $_SESSION["user"]; ?></h1>
                <form method="" action="modPass.php"> <button type="submit">Modificar Contraseña</button></form><br>
                <form method="" action="sendMessage.php"> <button type="submit">Enviar un mensaje</button></form><br>
                <form method="" action="receivedMessages.php"> <button type="submit">Consultar los mensajes recibidos</button></form><br>
                <form method="" action="sendedMessages.php"> <button type="submit">Consultar los mensajes enviados</button></form>
            </body>
        </html>
        <?php
    } else {
        echo "<h1>Sólo los usuarios pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>
