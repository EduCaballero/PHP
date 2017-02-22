<html>
    <head>
        <title>ejercicios</title>
    </head>
    <body>
        <?php
        if ($_GET["goto"] === "saludo") {
            ?>
            <form action="saludar.php" method="get">
                Introduce tu nombre:<input name="nom" type="text" placeholder="inputNombre" required/> 
                <input type="submit" value="¡Vamos a saludarte!" />
                <?php
            }
            if ($_GET["goto"] === "romano") {
                ?>
                <form action="numero.php" method="get">
                    Introduce un número del 1 al 500:<input name="num" type="number" placeholder="Intro num del 1 al 500 o te daré error" required/> 
                    <input type="submit" value="Continuar" /> 
                    <?php
                }

                if ($_GET["goto"] === "vida") {
                    ?>
                    <form action="vida.php" method="get">
                        Introduce año actual:<input name="any1" type="number" placeholder="Año actual" required/>
                        Introduce año de nacimiento:<input name="any2" type="number" placeholder="Año nacimiento" required/>
                        <input type="submit" value="Continuar" /> 
                        <?php
                    }
                    ?>
                    </body>
                    </html>