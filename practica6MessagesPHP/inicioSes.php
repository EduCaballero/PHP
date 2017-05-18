<html>
    <head>
        <meta charset="UTF-8">
        <title>INICIO DE SESIÓN</title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Nombre de Usuario: <input type="text" name="username"></p>
            <p>Password: <input type="password" name="pass"></p>
            <input type="submit" name="in" value="Login">
        </form>
        <?php
        require_once 'bbdd.php';
        if (isset($_POST["in"])) {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            if (validateUser($username, $pass)) {
                session_start();
                $_SESSION["user"] = $username;
                $tipo = getTypeByUsername($username);
                $_SESSION["tipo"] = $tipo;
                updateEvent($username, 'I');
                if ($tipo == 0) {
                    header("Location: homeUser.php");
                } else if ($tipo == 1) {
                    header("Location: homeAdmin.php");
                }
            } else {
                echo "<p>El usuario o la contraseña introducidos son incorrectos.</p>";
            }
        }
        ?>
    </body>
</html>