<html>
    <head>
        <title>Validar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        session_start();
        $username = $_POST['username'];
        $_SESSION["usuario"] = $username;
        $password = $_POST['pass'];
        $_SESSION["edad"] = $_POST['edad'];
        if (strlen($username) != 6 || strlen($password) != 4)
            echo "Tu nombre de usuario no tiene 6 caracteres o tu contraseña no tiene 4 caracteres <br>";
        else {
            ?>
         <ul>
             <li><a href="factura.php">Factura</a></li>
             <li><a href="edad.php">Edad</a></li>
             <li><a href="estadisticas.php">Estadisticas</a></li>
         </ul>
         <?php 
        }
        
        ?>  
    </body>
</html>