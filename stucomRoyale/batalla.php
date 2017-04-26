<html>
    <head>
        <meta charset="UTF-8">
        <link href="style7.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        session_start();
        require_once 'bbdd.php';
        if (isset($_SESSION["user"])) {
            $nombre = $_SESSION["user"];
            $tipo = $_SESSION["tipo"];
            if ($tipo == "0") {
                ?>
                <a href="home_user.php">Inicio</a>
                <div id="batalla">
                    <div id="carta">
                        <form action="" method="POST">
                            <p>Selecciona una carta</p>
                            <select name="eleccion">
                                <?php
                                $usuario = player1($nombre);

                                if (isset($_POST["batalla"])) {
                                    $cont = $_POST["contador"];
                                    $fase = $_POST["fase"];
                                } else {
                                    $cont = 0;
                                    $fase = "fase1";
                                }

                                while ($fila = mysqli_fetch_array($usuario)) {
                                    extract($fila);
                                    ?>
                                    <option value="<?php echo $card ?>"><?php echo $card ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" name="contador" value="<?php echo $cont ?>">
                            <input type="submit" name="<?php echo $fase; ?>" value="batalla" id="fases">
                        </form>
                    </div>
                    <?php
                    if (isset($_POST["fase1"])) {
                        $card = $_POST['eleccion'];
                        $vida = VidaCarta($card);
                        $randow = rand(0, 50);
                        $cont = $_POST["contador"];
                        $nv = NivelCarta($nombre, $card);
                        $vida = $vida + 2 * $nv;
                        ?>
                        <div id="fase1">
                            <p>La vida de la carta era: <?php echo $vida ?></p>
                            <p>El numero random que ha tocado es: <?php echo $randow ?> </p>
                            <?php
                            if ($randow < $vida) {
                                $cont++;
                                ?>
                                <p>el jugador ha ganado la primera fase</p>
                                <?php
                            } else {
                                ?>
                                <p>el jugador ha perdido la primera fase</p>
                                <?php
                            }
                            ?>
                            <form action="" method="POST">
                                <input type="hidden" name="fase" value="fase2">
                                <input type="hidden" name="con" value="<?php echo $cont ?>">
                                <input type="submit" value="Siguiente" name="batalla">
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_POST["fase2"])) {
                        $card2 = $_POST['eleccion'];
                        $tipo = TipoCarta($card2);
                        $rand = rand(1, 4);
                        $cont = $_POST["contador"];

                        if ($rand = 1) {
                            $rand = "comun";
                        } elseif ($rand = 2) {
                            $rand = "especial";
                        } elseif ($rand = 3) {
                            $rand = "epica";
                        } elseif ($rand = 4) {
                            $rand = "legendaria";
                        }
                        ?>
                        <div id="fase2">
                            <p>El tipo de la carta es: <?php echo $tipo ?></p>
                            <p>El tipo random es: <?php echo $rand ?> </p>
                            <?php
                            if ($tipo = $rand) {
                                $cont++;
                                ?>
                                <p>el jugador ha ganado la segunda fase</p>
                                <?php
                            } else {
                                ?>
                                <p>el jugador ha perdido le segunda fase</p>
                                <?php
                            }
                            ?>
                            <form action="" method="POST">
                                <input type="hidden" name="fase" value="fase3">
                                <input type="hidden" name="con" value="<?php echo $cont ?>">
                                <input type="submit" value="Fianal" name="batalla">
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_POST["fase3"])) {
                        $card3 = $_POST["eleccion"];
                        $cont = $_POST["contador"];
                        $elixir = ElixirCarta($card3);
                        $randi = rand(1, 10);
                        ?>
                        <div id="fase3">
                            <p>El coste de la carta es: <?php echo $elixir ?></p>
                            <p>El coste del random es: <?php echo $randi ?> </p>
                            <?php
                            if ($elixir > $randi) {
                                $cont++;
                                ?>
                                <p>el jugador ha ganado la tercera fase</p>

                                <?php
                            } else {
                                ?>
                                <p>el jugador ha perdido la tercera fase</p>
                                <?php
                            }

                            if ($cont >= 2) {
                                Wins($nombre);
                                $Win = NumeroGanado($nombre);
                                if ($Win % 5 == 0) {
                                    SubirNvUser($nombre);
                                }
                                if ($Win % 10 == 0) {
                                    $catas = arrayCarta();
                                    for ($i = 0; $i < 3; $i++) {
                                        caja($cartas, $nombre);
                                    }
                                }
                            } else {
                                ?>
                                <h1><p>Ha ganado la maquina</p></h1>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <?php
            } else {
                ?>
                <p>No tienes permisos para ver esta pagina</p>
                <?php
            }
        } else {
            ?>
            <p>No hay usuario valido</p>
            <?php
        }
        ?>
    </body>
</html>