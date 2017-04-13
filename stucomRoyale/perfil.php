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
                <title>Perfil del usuario</title>
            </head>
            <body>
                <?php
                require_once 'bbdd.php';
                $usuario = $_SESSION["user"];
                $datos = datosUsuario($usuario);
                while ($fila = mysqli_fetch_array($datos)) {
                    extract($fila);
                    echo "Nombre: $username<br>";
                    echo "Victorias: $wins<br>";
                    echo "Nivel: $level<br>";
                }
                
                $cartasJug=cartasJug($usuario); //selecciona todo de deck
                    
                    echo "<table border =1>
                    <caption>Cartas que tenemos</caption>
                    <tr>
                    <th> Nombre </th><th> Tipo </th><th> Rareza </th><th> Hitpoints </th><th> Daño </th><th> Coste </th>
                    </tr>";
        
                    while ($fila = mysqli_fetch_array($cartasJug)) {
                extract($fila);
                //extract($card);
                $card2 = getCardInfo($card);// Devuelve la información de una carta en forma de array
                extract($card2);
                $dañoActual=$damage+($level*2);
                $vidaActual=$hitpoints+($level*2);
                echo"<tr><td>$name</td><td>$type</td><td>$rarity</td><td>$vidaActual</td><td>$dañoActual</td><td>$cost</td></tr>";
                
                
                /*echo "<tr>";
                foreach ($card2 as $arrayCartasActual) {
                    
                    echo"<td> $arrayCartasActual </td>";
                }
                echo"</tr>";*/
               
            }
                
                
                ?>
            </body>
        </html>
        <?php
    } else {
        echo "<h2>Solo los usuarios pueden ver esta pagina.</h2>";
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
    }
} else {
    echo "<h2>Debes hacer login para ver esta pagina.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
?>