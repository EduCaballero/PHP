<!DOCTYPE html>
<?php
// Antes de mostrar la página nos aseguramos que hay un usuario autentificado
session_start();
if (isset($_SESSION["user"])) {
    // Si hay variable user en session es que un usuario se ha validado
    if ($_SESSION["tipo"] == 0) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Modificar Contraseña</title>
            </head>
            <body>
                <?php
                require_once 'bbdd.php';
                if (isset($_POST["modi"])) {
                    $passOld = $_POST["oldPass"];
                    $pass = $_POST["pass"];
                    $veri = $_POST["verif"];
                    $usuario = $_SESSION["user"];
                    $verPass = verPass($usuario, $passOld);
                    if ($pass != $veri) {
                        echo "<h2>Las contraseñas no coinciden.</h2>";
                        echo '<form method="" action="home_user.php"> <button type="submit">Atras</button> </form>';
                    } else if ($verPass == false) {
                        echo "<h2>La contraseña actual no es correcta.</h2>";
                        echo '<form method="" action="home_user.php"> <button type="submit">Atras</button> </form>';
                    } else {
                        // Ya está todo ok!!!! Podemos dar de alta el user :)
                        modificarPass($usuario, $pass);
                    }
                } else {
                    ?>
                    <form action="" method="POST">
                        <p><input type="text" name="oldPass" placeholder="Contraseña actual"></p>
                        <p><input type="password" name="pass" placeholder="Nueva Contraseña"></p>
                        <p><input type="password" name="verif" placeholder="Confirmar Nueva Contraseña"></p>
                        <input type="submit" name="modi" value="Modificar">
                    </form>
                    <?php
                }
            } else {
                echo "<h2>Solo los usuarios pueden ver esta pagina.</h2>";
                echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
            }
        } else {
            echo "<h2>Debes hacer login para ver esta pagina.</h2>";
            echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
        }
        ?>
    </body>
</html>
