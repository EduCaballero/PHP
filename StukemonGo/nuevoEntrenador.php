<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Entrenador</title>
    </head>
    <body>

        <?php
        if (isset($_POST["enviar"])) {
            // Recibimos los datos del formulario (POST)
            $name = $_POST["name"];
            $pokeball = $_POST["pokeball"];
            $potion = $_POST["potion"];

            // Necesitamos incluir el fichero bbdd.php
            require_once('bbddStukemon.php');
            // Insertamos datos en la bbdd
            insertarEntrenador($name, $pokeball, $potion);
        } else { //nombre , nº de pokeball s que tiene el entrenador y nº de pociones
            echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "name" required><br>
        Número de Pokeball: <input type = "number" name = "pokeball" required><br>
        Número de pociones: <input type = "number" name = "potion" required><br>
        <input type = "submit" name = "enviar" value = "Alta"><br>
        </form>';
        }
        ?>
        <form action="index.php" method="POST">
            <input type="submit" value="VOLVER">
        </form>

    </body>
</html>