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
        require_once 'bbdd_user.php';
        if (isset($_POST["modi"])) {
                $passOld = $_POST["oldPass"];
                $pass = $_POST["pass"];
                $veri = $_POST["verif"];
                $usuario = $_SESSION["user"];
                $verPass = validateUser($usuario,$passOld);
                if ($pass != $veri) {
                    echo "<h1>Las contraseñas no coinciden.</h1>";
                    echo '<form method="" action="home_user.php"> <button type="submit">Home</button> </form>';
                }else if($verPass==false){
                    echo "<h1>La contraseña actual no es correcta.</h1>";
                    if ($_SESSION["tipo"] == 1) echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
                    else echo '<form method="" action="home_user.php"> <button type="submit">Home</button> </form>';
                } else {
                    modificarPass($usuario, $pass);
                }
            
        } else {
            ?>
            <form action="" method="POST">
                <p><input type="password" name="oldPass" placeholder="Contraseña actual"></p>
                <p><input type="password" name="pass" placeholder="Nueva Contraseña"></p>
                <p><input type="password" name="verif" placeholder="Confirmar Nueva Contraseña"></p>
                <input type="submit" name="modi" value="Modificar">
            </form>
            <?php
        }
}else{
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}

        }else{
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
        ?>
    </body>
</html>