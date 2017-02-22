<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Equipo</title>
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
        } else {
            echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "name" required><br>
        Fecha de nacimiento: <input type = "date" name = "birth" placeholder="AAAA-MM-DD" required><br>
        Número de encestos: <input type = "number" name = "nbaskets" min="0" required><br>
        Número de asistencias: <input type = "number" name = "nassists" min="0" required><br>
        Número de rebotes: <input type = "number" name = "nrebounds" min="0" required><br>
        Posición: <input type = "text" name = "position" required><br>
        Equipo: <input type = "text" name = "team" required><br>
        <input type = "submit" name = "enviar" value = "Alta"><br>
        </form>';
        }
        ?>
        <form action="index.php" method="POST">
            <input type="submit" value="VOLVER">
        </form>

    </body>
</html>