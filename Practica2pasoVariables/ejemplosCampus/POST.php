Este método trabaja siempre a través de formularios.
Ejemplo con formulario y más de una variable:

Primera página: inicio.php envía los datos.
<html>
    <head>
        <title>Tu pelicula favorita</title>
    </head>
    <body>
        <form action="fav.php" method="POST">
            Nombre: <input type=text name="nombre">
            Edad: <input type=number name="edad">
            Pelicula favorita: <input type=text name="pelicula">
            <input type=submit name="enviar" value="Enviar">
        </form>
    </body>
</html>


Segunda página: fav.php recoge los datos y los muestra por pantalla.
<html>
    <head>
        <title>Uso de variables POST</title>
    </head>
    <body>
        <?php
        $name = $_POST["nombre"];
        $edad = $_POST["edad"];
        $favorita = $_POST["pelicula"];
        echo "Hola $name!! Bienvenid@<br>";
        echo "Tienes $edad años<br>";
        echo "Tu pelicula favorita es $favorita<br/>";
        ?>
    </body>
</html>
Cuando se trabaja con formularios se suelen utilizar las variables POST.