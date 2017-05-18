<!DOCTYPE html>
<!-- Página para registrar un usuario
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de usuarios</title>
    </head>
    <body>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["reg"])) {
            $email = $_POST["email"];
            // Comprobamos si existe un usuario con el mismo email
            if (existUser($email)) { // es lo mismo que existUser($email)==true
                echo "<p>Ya existe un usuario con ese email.</p>";
            } else {
                // Verificamos que la contraseña y la verificación son iguales
                $pass = $_POST["pass"];
                $veri = $_POST["verif"];
                if ($pass != $veri) {
                    echo "<p>Las contraseñas no coinciden. </p>";
                } else {
                    // Ya está todo ok!!!! Podemos dar de alta el user :)
                    $nom = $_POST["nombre"];
                    insertUser($email, $pass, $nom);
                }
            }
        } else {
            ?>
            <form action="" method="POST">
                <p>Email: <input type="email" name="email"></p>
                <p>Nombre: <input type="text" name="nombre"></p>
                <p>Password: <input type="password" name="pass"></p>
                <p>Verificación del password: <input type="password" name="verif"></p>
                <p><input type="submit" name="reg" value="Enviar"></p>
            </form>
            <?php
        }
        ?>
    </body>
</html>
