<!DOCTYPE html>
<!-- Página para registrar un usuario
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link href="style2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["reg"])) {
            $usuario = $_POST["usuario"];
            // Comprobamos si existe un usuario con el mismo email
            if (existUser($usuario)) { // es lo mismo que existUser($email)==true
                echo "<h1>Ya existe un usuario con ese nombre.</h1>";
                echo '<img src="img/Sad_Face.png" style="width:250px;height: 300px;"/>';
                echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
            } else {
                // Verificamos que la contraseña y la verificación son iguales
                $pass = $_POST["pass"];
                $veri = $_POST["verif"];
                if ($pass != $veri) {
                    echo "<h1>Las contraseñas no coinciden.</h1>";
                    echo '<img src="img/Sad_Face.png" style="width:250px;height: 300px;"/>';
                    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
                } else {
                    // Ya está todo ok!!!! Podemos dar de alta el user :)
                    insertUser($usuario, $pass);
                }
            }
        } else {
            ?>
        <img src="img/Clash_Royale_Logo.png" style="width:500px;height: 200px;"/>
            <form action="" method="POST">
                <p><input type="text" name="usuario" placeholder="Uruario"></p>
                <p><input type="password" name="pass" placeholder="Contraseña"></p>
                <p><input type="password" name="verif" placeholder="Confirmar Contraseña"></p>
                <input type="submit" name="reg" value="Enviar">
            </form>
            <?php
        }
        ?>
    </body>
</html>
