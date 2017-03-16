<?php
//Antes de mostrar la página nos aseguramos que hay un asuario identificado
session_start();
if(isset($_SESSION["user"])){
    //Si hay variable user en session es que un usuario se ha validad    
    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Página del usuario</title>
    </head>
    <body>
        <p>Ola k ase</p>
        <?php
        // Saludamos al usuario
        $email=$_SESSION["user"];
        echo"<h1>Bienvenido. $email</h1>";
        ?>
    </body>
</html>
<?php
}else{
    echo"<p>Debes hacer el login para entrar en esta página</p>";
}
?>

