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
            $city = $_POST["city"];
            $creation = $_POST["creation"];

            // Necesitamos incluir el fichero bbdd.php
            require_once('bbdd.php');
            // Insertamos datos en la bbdd
            insertarEquipo($name, $city, $creation);
        } else {
            echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "name" required><br>
        Ciudad: <input type = "text" name = "city" required><br>
        Fecha creación: <input type = "date" name = "creation" placeholder="AAAA-MM-DD" required><br>
        <input type = "submit" name = "enviar" value = "Alta"><br>
        </form>';
        }
        ?>
        <form action="index.php" method="POST">
            <input type="submit" value="VOLVER">
        </form>

    </body>
</html>