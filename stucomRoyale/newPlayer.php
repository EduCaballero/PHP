<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO</title>
        <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/pluginValidacion.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        require_once 'bbdd.php';
        if(isset($_POST["reg"])){
            //Comprobamos si existe un usuario com el mismo email
            $usuario = $_POST["userName"];
            if (existUser($usuario)){// es lo mismo que existUser($email)==true
                echo "<p>Ya existe un usuario con ese user.</p>";
                echo'<form action="index.php" method="POST">'
                . '<input type="submit" value="Volver">'
                        . '</form>';
        } else {
                // Verificamos que la contraseña y la verificación son iguales
                $pass = $_POST["pass"];
                $verif = $_POST["verif"];
                if ($pass != $verif) {
                    echo "<p>Las contraseñas no coinciden. </p>";
                    echo'<form action="index.php" method="POST">'
                    . '<input type="submit" value="Volver a Home">'
                    . '</form>';
                } else {
                    // Está todo correcto. Podemos dar de alta el usuario
                    $userName = $_POST["userName"];
                    insertUser($userName, $pass);
                    regalo($userName);
                    $cartasJug=cartasJug($userName);
                    
                    echo "<table border =1>
                    <caption>Cartas entregadas *(Si hay menos de 3 es porque han salido repetidas y, por tanto, no se entrega otra carta si no que sube de nivel. Creo que es lo que se pide en la práctica)</caption>
                    <tr>
                    <th> Nombre </th><th> Tipo </th><th> Rareza </th><th> Hitpoints </th><th> Daño </th><th> Coste </th>
                    </tr>";
        
                    while ($fila = mysqli_fetch_array($cartasJug)) {
                extract($fila);
                //extract($card);
                $card2 = getCardInfo($card);
                //$i=0;
                /*echo "<table border =1>
                <caption>Carta entregada</caption>
                <tr>
                <th> Nombre </th><th> Tipo </th><th> Rareza </th><th> Hitpoints </th><th> Daño </th><th> Coste </th>
                </tr>";*/
                echo "<tr>";
                foreach ($card2 as $arrayCartasActual) {
                    
                    echo"<td> $arrayCartasActual </td>";
                }
                echo"</tr>";
                //$i++;
            }
        }
    }
} else {
?>
        <header>Registro nuevo jugador</header>
        <form action="" method="POST">
            <fieldset>
                <h4>Nuevo Jugador</h4>
                <p>
                    <label>Nombre de usuario:</label>
                    <input type="text" name="userName" maxlength="20" required>
                </p>
                <p>
                    <label>Contraseña:</label>
                    <input type="password" name="pass" maxlength="10" required>
                </p>
                <p>
                    <label>Confirma contraseña:</label>
                    <input type="password" name="verif" maxlength="10" required>
                </p>
                <input type="submit" name="reg" value="Alta">
            </fieldset>
        </form>
        <form action="index.php" method="POST">
            <input type="submit" value="Volver">
        </form> 
        <?php
        }
        ?>
    </body>
</html>