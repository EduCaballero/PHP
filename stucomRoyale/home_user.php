<!DOCTYPE html>
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
            <title>Homepage del usuario</title>
        </head>
        <body>
            <?php
            // Saludamos al usuario
            echo '<h2>BIENVENIDO</h2>
                <form method="" action="modificarPass.php"> <button type="submit">Modificar Contraseña</button> </form> 
                <form method="" action="perfil.php"> <button type="submit">Perfil</button> </form> 
                <form method="" action="batalla.php"> <button type="submit">Ir a la Batalla</button> </form> 
                <form method="" action="salir.php"> <button type="submit">Salir</button> </form> ';
            ?>
        </body>
    </html>
    <?php
     }else {
    echo '<h1>Sólo los usuarios pueden ver esta pagina</h1>        
        <form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
     
     } else {
    echo '<h1>Debes hacer login primero para poder acceder a esta pagina.</h1>
        <form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
?>

