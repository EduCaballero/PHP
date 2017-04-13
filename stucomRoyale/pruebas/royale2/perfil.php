<!DOCTYPE html>
<!-- HomePage del user -->
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
            <link href="style6.css" rel="stylesheet" type="text/css"/>
            <title>Perfil</title>
        </head>
        <body>
            <?php
            require_once 'bbdd_user.php';
            $usuario = $_SESSION["user"];
            echo '<img src="img/Clash_Royale_Logo.png" style="width:400px;height: 150px;"/>';
            $datos = datosUsuario($usuario);
            while ($fila = mysqli_fetch_array($datos)) {
                extract($fila);
                echo "<h3>Nombre: $username</h3><br>";
                echo "<h3>Ganado: $wins</h3><br>";  
                echo "<h3>Nivel: $level</h3><br>";
            }
            ?>
        </body>
    </html>
    <?php
}else {
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}

            } else {
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
?>