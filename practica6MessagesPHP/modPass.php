<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Modificar Contraseña</title>
            </head>
            <body>
                <?php
                require_once 'bbdd.php';
                if (isset($_POST["mod"])) {
                    $passOld = $_POST["oldPass"];
                    $pass = $_POST["pass"];
                    $veri = $_POST["verif"];
                    $usuario = $_SESSION["user"];
                    $verPass = validateUser($usuario, $passOld);
                    if ($pass != $veri) {
                        echo "<h1>Las nuevas contraseñas que has introducido no coinciden.</h1>";
                        if ($_SESSION["tipo"] == 1)
                            echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
                        else
                            echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button> </form>';
                    } else if ($verPass == false) {
                        echo "<h1>La contraseña actual que has introducido no es correcta.</h1>";
                        if ($_SESSION["tipo"] == 1)
                            echo '<form method="" action="homeAdmin.php"> <button type="submit">Volver</button> </form>';
                        else
                            echo '<form method="" action="homeUser.php"> <button type="submit">Volver</button> </form>';
                    } else {
                        modificarPass($usuario, $pass);
                    }
                } else {
                    ?>
                    <form action="" method="POST">
                        <p><input type="password" name="oldPass" placeholder="Introduce la contraseña actual"></p>
                        <p><input type="password" name="pass" placeholder="Introduce la nueva contraseña"></p>
                        <p><input type="password" name="verif" placeholder="Confirma la nueva contraseña"></p>
                        <input type="submit" name="mod" value="Cambiar contraseña">
                    </form>
                    <?php
                }
            } else {
                echo "<h1>Solo los usuarios registrados o administradores pueden acceder a esta página.</h1>";
                echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
            }
        } else {
            echo "<h1>Sin login no entras!</h1>";
            echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
        }
        ?>
    </body>
</html>