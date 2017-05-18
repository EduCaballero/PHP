<?php
// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
    if ($_SESSION["tipo"] == 1) {
        ?>
        <!DOCTYPE html>
        <!-- Página para dar de alta usuarios
        -->
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Registro</title>
            </head>
            <body>
                <?php
                require_once 'bbdd.php';
                if (isset($_POST["reg"])) {
                    $username = $_POST["username"];
                    if (existUser($username)) {
                        echo "<p>Ya existe un usuario con ese nombre de usuario.</p>";
                    } else {
                        $pass = $_POST["pass"];
                        $verify = $_POST["verif"];
                        if ($pass != $verify) {
                            echo "<p>Las contraseñas introducidas no coinciden. </p>";
                            echo "<form action='homeAdmin.php'> <button type='submit'>Volver</button> </form>";
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
                        <p>Nombre de usuario: <input type="text" name="username"></p>
                        <p>Nombre: <input type="text" name="nombre"></p>
                        <p>Apellido: <input type="text" name="apellido"></p>
                        <p>Tipo de usuario: <select name="tipo">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select></p>
                        <p>Password: <input type="password" name="pass"></p>
                        <p>Verifica el password: <input type="password" name="verif"></p>
                        <p><input type="submit" name="reg" value="Enviar"></p>
                    </form>
                    <?php
                }
                ?>
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