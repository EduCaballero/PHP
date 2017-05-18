<!DOCTYPE html>
<!-- Aquí se registrará el nuevo usuario-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO</title>
    </head>
    <body>
        <?php
        require_once 'bbdd.php';
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
                <p>Nombre de Usuario: <input type="text" name="username"></p>
                <p>Nombre: <input type="text" name="nombre"></p>
                <p>Apellido: <input type="text" name="apellido"></p>
                <p>Password: <input type="password" name="pass"></p>
                <p>Verifica el password: <input type="password" name="verif"></p>
                <p><input type="submit" name="reg" value="Enviar"></p>
            </form>
            <?php
        }
        ?>
    </body>
</html>

