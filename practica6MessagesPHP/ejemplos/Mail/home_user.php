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
            <title>Pagina del Usuario</title>
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
            
        </body>
    </html>

     <?php 
     
     }else {
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     } else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     ?>
