<!DOCTYPE html>
<!--
Primera versión conectando a una BBDD
index.php va a ser el formulario de Alta de un alumno
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de alumno</title>
    </head>
    <body>
        <form action="alta.php" method="POST">
            Nombre: <input type="text" name="nombre" required>
            Edad: <input type="number" name="edad" required>
            Ciudad: <input type="text" name="ciudad" required>
            Teléfono: <input type="text" name="telefono" required>
            Sexo: <input type="text" name="sexo" required>
            <input type="submit" name="enviar" value="Alta">
        </form>
    </body>
</html>
