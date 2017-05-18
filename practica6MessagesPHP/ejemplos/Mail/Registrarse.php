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
                    insertUser($username, $pass, $nombre, $apellido);
                }
            }
        } else {
            ?>
        
            <form action="" method="POST">
                <p>Username: <input type="text" name="username"></p>
                <p>Nombre: <input type="text" name="nombre"></p>
                <p>Apellido: <input type="text" name="apellido"></p>
                <p>Password: <input type="password" name="pass"></p>
                <p>Verificación del password: <input type="password" name="verif"></p>
                <p><input type="submit" name="reg" value="Enviar"></p>
            </form>
            <?php
        }
        ?>
    </body>
</html>

