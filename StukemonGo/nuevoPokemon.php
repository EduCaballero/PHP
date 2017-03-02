<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Pokémon</title>
    </head>
    <body>

        <?php
        // Necesitamos incluir el fichero bbdd.php
        require_once('bbddStukemon.php');
        
        if (isset($_POST["enviar"])) {
            // Recibimos los datos del formulario (POST)
            $nombre = $_POST['name'];
            $tipo = $_POST['type'];
            $habilidad = $_POST['ability'];
            $ataque = $_POST['atack'];
            $defensa = $_POST['defense'];
            $velocidad = $_POST['speed'];
            $vida = $_POST['life'];
            $nivel = $_POST['level'];
            $entrenador = $_POST['entrenador'];

            // Insertamos datos en la bbdd
            insertarPokemon($nombre, $tipo, $habilidad, $ataque, $defensa, $velocidad, $vida, $nivel, $entrenador);
        } else { //nombre , tipo (agua, fuego, etc…) ,
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
        Velocidad: <input type = "number" name = "speed" min="0" required><br>
        Vida: <input type = "number" name = "life" min="0" required><br>';
        echo'Selecciona el entrenador al que pertenece:<select name="entrenador">';       
        $entrenadores = entrenadoresMenos6Pokemon();
        while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo '</option>';
        }
        echo '</select><br>';
        echo '<input type="hidden" name="level" value="0" required>';
        echo'<input type = "submit" name = "enviar" value = "Alta">';
        echo'</form>';
        }
        ?>  
        
        <form action="index.php" method="POST">
            <input type="submit" value="Volver">
        </form>

    </body>
</html>