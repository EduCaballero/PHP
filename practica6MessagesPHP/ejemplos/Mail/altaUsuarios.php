<?php
// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
     if ($_SESSION["tipo"] == 1) {
    ?>
<!DOCTYPE html>
<!-- Página para registrar un usuario
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
    </head>
    <body>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["reg"])) {
            $username = $_POST["username"];
            if (existUser($username)) {
                echo "<p>Ya existe un usuario con ese username.</p>";
            } else {
                $pass = $_POST["pass"];
                $veri = $_POST["verif"];
                if ($pass != $veri) {
                    echo "<p>Las contraseñas no coinciden. </p>";
                } else {
                    $nombre = $_POST["nombre"];
                    $apellido = $_POST["apellido"];
                    $tipo = $_POST["tipo"];
                    insertUserByAdmin($username, $pass, $nombre, $apellido, $tipo);
                }
            }
        } else {
            ?>
        
            <form action="" method="POST">
                <p>Username: <input type="text" name="username"></p>
                <p>Nombre: <input type="text" name="nombre"></p>
                <p>Apellido: <input type="text" name="apellido"></p>
                <p>Tipo User: <select name="tipo">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                              </select>
                </p>
                <p>Password: <input type="password" name="pass"></p>
                <p>Verificación del password: <input type="password" name="verif"></p>
                <p><input type="submit" name="reg" value="Enviar"></p>
            </form>
            <?php
        }
        ?>
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