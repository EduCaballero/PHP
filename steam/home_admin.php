<?php 
session_start();
if (isset($_SESSION["user"])){
    //Nos aseguramos que el usuario sea admin
    //Cogemos el tipo de la variable de sesión
    $tipo=$_SESSION["tipo"];
    if($tipo==admin){
?>
<!DOCTYPE html>
<!--
Página principal del usuario admin
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home page administrator</title>
    </head>
    <body>
        <h1>Bienvenido administrador</h1>
        <h3>Qué quieres hacer?</h3>
        <a href="admin_alta.php">Ir a dar de alta un juego</a>
        <?php
        
        ?>
    </body>
</html>
<?php
    }else{
        echo"<p>No tienes permisos para ver esta página</p>";
    }
}else{
    echo"<p>No hay un usuario validado</p>";
}
?>