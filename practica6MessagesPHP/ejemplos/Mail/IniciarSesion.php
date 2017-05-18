<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Username: <input type="text" name="username"></p>
            <p>Password: <input type="password" name="pass"></p>
            <input type="submit" name="entrar" value="Login">
        </form>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["entrar"])) {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            if (validateUser($username, $pass)) {
                session_start();
                $_SESSION["user"] = $username;
                $tipo = getTypeByUsername($username);
                $_SESSION["tipo"] = $tipo;
                updateEvent($username, 'I');
                if ($tipo == 0) {
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