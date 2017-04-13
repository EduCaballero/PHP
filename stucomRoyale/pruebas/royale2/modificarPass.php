<!DOCTYPE html>
<!-- Página para registrar un usuario
-->
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
        <link href="style5.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require_once 'bbdd_user.php';
        if (isset($_POST["modi"])) {
                $passOld = $_POST["oldPass"];
                $pass = $_POST["pass"];
                $veri = $_POST["verif"];
                $usuario=$_SESSION["user"];
                $verPass = verPass($usuario,$passOld);
                if ($pass != $veri) {
                    echo "<h1>Las contraseñas no coinciden.</h1>";
                    echo '<img src="img/Sad_Face.png" style="width:250px;height: 300px;"/>';
                    echo '<form method="" action="home_user.php"> <button type="submit">Atras</button> </form>';
                }else if($verPass==false){
                    echo "<h1>La contraseña actual no es correcta.</h1>";
                    echo '<img src="img/Sad_Face.png" style="width:250px;height: 300px;"/>';
                    echo '<form method="" action="home_user.php"> <button type="submit">Atras</button> </form>';
                } else {
                    // Ya está todo ok!!!! Podemos dar de alta el user :)
                    modificarPass($usuario, $pass);
                }
            
        } else {
            ?>
        <img src="img/Clash_Royale_Logo.png" style="width:500px;height: 200px;"/>
            <form action="" method="POST">
                <p><input type="text" name="oldPass" placeholder="Contraseña actual"></p>
                <p><input type="password" name="pass" placeholder="Nueva Contraseña"></p>
                <p><input type="password" name="verif" placeholder="Confirmar Nueva Contraseña"></p>
                <input type="submit" name="modi" value="Modificar">
            </form>
            <?php
        }
}else{
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}

        }else{
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
        ?>
    </body>
</html>
