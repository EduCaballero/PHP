Ejemplo con hipervínculo:
Primera página: inicio.php envía los datos.

<html>
    <head>
        <title>Encuentra mi peli favorita</title>
    </head>
    <body>
        <?php
        echo "Mi peli favorita es: <br/>";
        echo "<a href='peliculas.php?favorita=Pulp Fiction'>";
        echo "Pulsa aqui para saber cual es!";
        echo "</a>";
        ?>
    </body>
</html>

Segunda página: películas.php recoge los datos y los muestra por pantalla.
<html>
    <head>
        <title>Uso de variables- Mi Peli favorita</title>
    </head>
    <body>
        <?php
        $fav = $_GET["favorita"];
        echo "Mi peli favorita es $fav<br/>";
        ?>
    </body>
</html>


------------------------------------------------------
Ejemplo con formulario:
Primera página: inicio.php envía los datos.
<html>
    <head>
        <title>Tu pelicula favorita</title>
    </head>
    <body>
        <form action="favoritaGet.php" method="GET">
            Pelicula favorita: <input type=text name="pelicula">
            <input type=submit name="enviar" value="Enviar">
        </form>
    </body>
</html>

Segunda página: favoritaGet.php recoge los datos y los muestra por pantalla.
<html>
    <head>
        <title>Uso de variables GET</title>
    </head>
    <body>
        <?php
        $fav = $_GET["pelicula"];
        echo "Tu pelicula favorita es $fav<br/>";
        ?>
    </body>
</html>
Aunque en estos ejemplos se haya pasado una única variable, se pueden pasar tantas
como sean necesarias.