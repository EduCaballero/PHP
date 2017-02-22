En el ejemplo siguiente habrá 4 ficheros:

1. Inicio.php: Formulario de inicio de sesión, donde se envía el nombre de
usuario a través de un formulario con el método POST.

2. Segundo.php: Recibimos el nombre de usuario y lo guardamos en una
variable de Sessión. Saludamos al usuario. Añadimos un enlace a la página
siguiente para ver como desde varias páginas pueden acceder a dicha
variable de sesión.

3. Tercero.php: Saludamos al usuario, porque podemos acceder a la variable
de sesión. Añadimos un enlace a una cuarta página que nos permitirá cerrar
sesión.

4. Cuarto.php: Cerramos la sesión y nos despedimos el usuario.
Primera página: inicio.php, formulario de inicio de sesión, donde se envía el nombre de
usuario a través de un formulario con el método POST.


<html>
    <head>
        <title>Trabajando con sesiones</title>
    </head>
    <body>
        <form action="segundo.php" method="POST">
            Nombre: <input type=text name="nombre">
            <input type=submit name="enviar" value="Enviar">
        </form>
    </body>
</html>

--------
Segunda página: segundo.php, recibimos el nombre de usuario y lo guardamos en una
variable de session. Saludamos al usuario. Añadimos un enlace a la página siguiente
para ver como desde varias páginas pueden acceder a dicha variable de sesión.

<html>
    <head>
        <title>Recibimos el nombre POST</title>
    </head>
    <body>
        <?php
        // Para trabajar con las variables de sesión es imprescindible
        // llamar a este método
        session_start();

        // Recibimos el nombre
        $nombre = $_POST["nombre"];

        // Guardamos el nombre en una variable de sesion
        $_SESSION["usuario"] = $nombre;

        // Saludamos al usuario
        echo "Hola $nombre!! Bienvenid@<br>";

        // Enlace a la siguiente página
        echo "<a href='tercero.php'>Pulsa aquí para ir a la siguiente
página</a>";
        ?>
    </body>
</html>

-----------
Tercera página: tercero.php, saludamos al usuario, porque podemos acceder a la
variable de sesión. Añadimos un enlace a una cuarta página que nos permitirá cerrar
sesión.

<html>
    <head>
        <title>Seguimos con la sesion</title>
    </head>
    <body>
        <?php
        // Para trabajar con las variables de sesión es imprescindible
        // llamar a este método
        session_start();

        // Recibimos el nombre de la varaible de sesión
        $name = $_SESSION["usuario"];

        // Saludamos al usuario
        echo "Hola $name!! Todavía por aquí? :) <br>";

        // Enlace para cerrar sesión
        echo "<a href='cuarto.php'>Cerrar sesión</a>";
        ?>
    </body>
</html>

------------
Cuarta página: cuarto.php, nos despedimos al usuario y cerramos sesión.

<html>
    <head>
        <title>Cerramos sesión</title>
    </head>
    <body>
        <?php
        // Para trabajar con las variables de sesión es imprescindible
        // llamar a este método
        session_start();

        // Recibimos el nombre de la varaible de sesión
        $name = $_SESSION["usuario"];

        // Nos despedimos del usario
        echo "Hasta la próxima $name<br>";

        // Cerramos sesión, destruye todas las variables de sesión
        // Ya no podemos acceder al usuario
        session_destroy();
        ?>
    </body>
</html>

Evidentemente, nuestra aplicación web puede tener tantas páginas php como sean
necesarias. Pueden ser más o menos que en este ejemplo. Este ejemplo intenta
ilustrar el uso de las variables de sesión, en general, el nº de páginas que utilicemos
dependerá de las funcionalidades de nuestra aplicación web.