<?php
session_start();
if (isset($_SESSION["user"])) {
     if ($_SESSION["tipo"] == 1) {
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <link href="style3.css" rel="stylesheet" type="text/css"/>
            <title>Pagina del Administrador</title>
        </head>
        <body>
            <h1>Pagina principal de <?php echo $_SESSION["user"]; ?></h1>
            <form method="" action="modificarPass.php"> <button type="submit">Modificar Contraseña</button> </form>
            <br>
            <form method="" action="enviarEmail.php"> <button type="submit">Enviar Email</button> </form>
            <br>
            <form method="" action="consultarEmail.php"> <button type="submit">Consultar Emails Recibidos</button> </form>
            <br>
            <form method="" action="consultarEmailsEnviados.php"> <button type="submit">Consultar Emails Enviados</button> </form>
            <br>
            <form method="" action="listadoDeUsuarios.php"> <button type="submit">Listado de Usuarios</button> </form>
            <br>
            <form method="" action="altaUsuarios.php"> <button type="submit">Alta Uusarios</button> </form>
            <br>
            <form method="" action="eliminarUsuarios.php"> <button type="submit">Eliminar Usuarios</button> </form>
            <br>
            <form method="" action="listadoMensajes.php"> <button type="submit">Listado Mensajes</button> </form>
            <br>
            <form method="" action="ultimoInicio.php"> <button type="submit">Ultimo Inicio</button> </form>
            <br>
            <form method="" action="ranking.php"> <button type="submit">Ranking</button> </form>
            
            
            
        </body>
    </html>

     <?php 
     
     }else {
    echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     } else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     ?>
