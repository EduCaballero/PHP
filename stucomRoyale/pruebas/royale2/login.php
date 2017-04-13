<!DOCTYPE html>
<!-- Página de login -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <img src="img/Clash_Royale_Logo.png" style="width:500px;height: 200px;"/>
        <form action="" method="POST">
            <p><input type="text" name="usuario" placeholder="Usuario"></p>
            <p><input type="password" name="pass" placeholder="Contraseña"></p>
            <input type="submit" name="entrar" value="Login">
        </form>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["entrar"])) {
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
