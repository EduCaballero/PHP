<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <header>LOGIN</header>
        <form action="" method="POST">
            <fieldset>
                <h4>LOGIN</h4>
                <p>
                    <label>Nombre de usuario:</label>
                    <input type="text" name="usuario" placeholder="Usuario">
                </p>
                <p>
                    <label>Contraseña:</label>
                    <input type="password" name="pass" placeholder="Contraseña">
                </p>
                <input type="submit" name="loguear" value="Login">
            </fieldset>
        </form>
        
        <?php
        require_once 'bbdd.php';
        if (isset($_POST["loguear"])) {
            $user = $_POST["usuario"];
            $pass = $_POST["pass"];
            if (validateUser($user, $pass)) {
                // Ole ole! el usuario ha hecho login
                // Abrimos sesión
                session_start();
                // Guardamos el email en una variable de session
                $_SESSION["user"] = $user;
                // Comprobamos el tipo para dirigir al user
                $tipo = getTypeByUser($user);
                $_SESSION["tipo"] = $tipo;
                if ($tipo == 0) {
                    // Dirigimos al usuario a su página
                    header("Location: home_user.php");
                }else if($tipo == 1){
                    header("Location: home_admin.php");
                }
            } else {
                echo "<p>Usuario o contraseña incorrectos.</p>";
            }
        }
        ?>
    </body>
</html>
