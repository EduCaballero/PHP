<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 1) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <link href="style3.css" rel="stylesheet" type="text/css"/>
                <title>Administrador</title>
            </head>
            <body>
                <h1>Página principal del administrador <?php echo $_SESSION["user"]; ?></h1>
                <form method="" action="modPass.php"> <button type="submit">Modificar Contraseña</button></form><br>
                <form method="" action="sendMessage.php"> <button type="submit">Enviar un mensaje</button></form><br>
                <form method="" action="receivedMessages.php"> <button type="submit">Consultar los mensajes recibidos</button></form><br>
                <form method="" action="sendedMessages.php"> <button type="submit">Consultar los mensajes enviados</button></form>
                <form method="" action="userList.php"> <button type="submit">Consultar listado de usuarios</button></form><br>
                <form method="" action="regUsers.php"> <button type="submit">Registrar usuarios</button> </form><br>
                <form method="" action="deleteUser.php"> <button type="submit">Eliminar un usuario</button></form><br>
                <form method="" action="messageList.php"> <button type="submit">Obtener lista de todos los mensajes</button></form><br>
                <form method="" action="lastLogin.php"> <button type="submit">Obtener último inicio de sesión de un usuario</button></form><br>
                <form method="" action="ranking.php"> <button type="submit">Ranking de usuarios por la cantidad de mensajes</button></form>  
            </body>
        </html>
        <?php
    }else{
        echo "<h1>Sólo los admin pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
}else{
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>
