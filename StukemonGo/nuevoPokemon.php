<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Pokémon</title>
    </head>
    <body>

        <?php
        if (isset($_POST["enviar"])) {
            // Recibimos los datos del formulario (POST)
            $name = $_POST["name"];
            $birth = $_POST["birth"];
            $nbaskets = $_POST["nbaskets"];
            $nassists = $_POST["nassists"];
            $nrebounds = $_POST["nrebounds"];
            $position = $_POST["position"];
            $team = $_POST["team"];            

            // Necesitamos incluir el fichero bbdd.php
            require_once('bbdd.php');
            // Insertamos datos en la bbdd
            insertarJugador($name, $birth, $nbaskets, $nassists, $nrebounds, $position, $team);
        } else { //nombre , tipo (agua, fuego, et c…) ,
                //habilidad, nivel de ataque , nivel de de fensa, velocidad y vida.
            echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "name" required><br>
        Tipo: <select name="type">
        <option value="fire">Fuego</option>
        <option value="water">Agua</option>
        <option value="electric">Electricidad</option>
        <option value="grass">Planta</option>
        </select><br>
        Habilidad: <input type = "text" name = "ability" required><br>
        Nivel de ataque: <input type = "number" name = "atack" min="0" required><br>
        Nivel de defensa: <input type = "number" name = "defense" min="0" required><br>
        Velocidad: <input type = "number" name = "velocity" min="0" required><br>
        Vida: <input type = "number" name = "life" min="0" required><br>
        Selecciona el jugador a modificar: <select name="belong">
        // Leemos los nombres de la bbdd
        $names = selectNombresJugadores();
        // Vamos extrayendo los nombres y añadiendolos a la lista
        while ($fila=  mysqli_fetch_array($names)) {
        extract($fila);
        <option value="$name">$name</option>        
        </select>
        <input type = "submit" name = "enviar" value = "Alta"><br>
        </form>';
        }
        ?>
        <form action="index.php" method="POST">
            <input type="submit" value="VOLVER">
        </form>

    </body>
</html>