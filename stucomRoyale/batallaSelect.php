<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUCOM ROYALE</title>
    </head>
    <body>
        <?php
        session_start();
        if (empty($_SESSION["user"])) { // Si NO has iniciado sesión
            echo "<h1>No tienes permiso para ver esta página.</h2>";
            echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
        } else {
            require_once "bbdd.php";
            require_once "libs/selects.php";
            require_once "libs/cards.php";
            require_once "libs/updates.php"
            ?>
            <?php
            if (isset($_POST["fase1"])) { // FASE 2
                
                $atk = rand(0, 50);
                $card = getCardStats($_POST["cardchosen"], $_SESSION["user"]);
                if ($card["hitpoints"] > $atk) {
                    $fase1 = "¡El jugador gana la primera fase! " . $card["name"] . ", con " . $card["hitpoints"] . " de vida, recibe " . $atk . " puntos de daño y se queda a " . ($card["hitpoints"] - $atk);
                    $_SESSION["win-rounds"] = 1;
                } else {
                    $fase1 = "¡El jugador pierde la primera fase! " . $card["name"] . ", con " . $card["hitpoints"] . " de vida, recibe " . $atk . " puntos de daño y se queda a " . ($card["hitpoints"] - $atk);
                    $_SESSION["win-rounds"] = 0;
                }
                ?>
                <h1>¡FASE 2!</h1>
                <h3>Resultados de la fase 1: <?php echo $fase1; ?></h3>
                <article id="2" class="well">
                    <h2>Escoge una carta</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="card"><span class="glyphicon glyphicon-chevron-right"></span> Tu carta:</label>
                            <select class="form-control" name="cardchosen">
                                <?php selectCards($_SESSION["user"]); ?>
                            </select>
                        </div>
                        <input id="submit-type" type="submit" class="btn btn-primary btn-block" name="fase2" value="¡Esta es mi carta!">
                    </form>
                </article>

            <?php
            } else if (isset($_POST["fase2"])) { // FASE 3
                if ($_SESSION["win-rounds"] > 2)
                    $_SESSION["win-rounds"] = 0; // Punish for cheating
                $cards = getAllCards();
                $rand = rand(0, getNCards() - 1);
                $cardcpu = $cards[$rand];
                $carduserinfo = getCardInfo($_POST["cardchosen"]);
                $cardcpuinfo = getCardInfo($cardcpu);
                if ($carduserinfo["rarity"] == $cardcpuinfo["rarity"]) {
                    $fase2 = "¡El jugador gana la segunda fase! ¡Las rarezas de cartas coinciden! (" . $carduserinfo["rarity"] . ")";
                    $_SESSION["win-rounds"] ++;
                } else
                    $fase2 = "¡El jugador pierde la segunda fase! Rareza del jugador: " . $carduserinfo["rarity"] . " --- Rareza de la CPU: " . $cardcpuinfo["rarity"];
                ?>
                <h1>¡FASE 3!</h1>
                <h3>Resultados de la fase 2: <?php echo $fase2; ?></h3>
                <article id="3" class="well">
                    <h2>Escoge una carta</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="card"><span class="glyphicon glyphicon-chevron-right"></span> Tu carta:</label>
                            <select class="form-control" name="cardchosen">
                                <?php selectCards($_SESSION["user"]); ?>
                            </select>
                        </div>
                        <input id="submit-type" type="submit" class="btn btn-primary btn-block" name="fase3" value="¡Esta es mi carta!">
                    </form>
                </article>

            <?php
            } else if (isset($_POST["fase3"])) { // FINAL
                $randnum = rand(0, 10);
                $card = getCardInfo($_POST["cardchosen"]);
                if ($card["cost"] > $randnum) {
                    $fase3 = "¡El jugador gana la tercera fase! ¡El coste de elixir de su carta es más alto! (" . $card["cost"] . " > " . $randnum . ")";
                    $_SESSION["win-rounds"] ++;
                } else
                    $fase3 = "¡El jugador pierde la tercera fase! ¡El coste de elixir de su carta es más bajo! (" . $card["cost"] . " < " . $randnum . ")";
                if ($_SESSION["win-rounds"] > 1) {
                    $winner = $_SESSION["user"];
                    updateWins($winner);
                    getSession($winner);
                } else
                    $winner = "CPU";
                ?>
                <h1>¡Batalla terminada!</h1>
                <h3>Resultados de la fase 3: <?php echo $fase3; ?></h3>
                <h2>Ganador: <?php echo $winner; ?></h2>
        <?php
        if (($_SESSION["wins"]) % 10 == 0 && $winner != "CPU")
            echo "<h1>¡Has subido de nivel!</h1>";
        if (($_SESSION["wins"]) % 5 == 0 && $winner != "CPU") {
            echo "<h2>¡Cofre desbloqueado!</h2>";
            reward($winner);
        }
        $_SESSION["win-rounds"] = 0;
        ?>
                <a href="home.php" class="btn btn-primary">¡A mi perfil!</a>
            <?php } else {
                $_SESSION["win-rounds"] = 0; ?> <!-- FASE 1 -->
                <h1>¡FASE 1!</h1>
                <article id="1" class="well">
                    <h2>Escoge una carta</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="card"><span class="glyphicon glyphicon-chevron-right"></span> Tu carta:</label>
                            <select class="form-control" name="cardchosen">
                                <?php selectCards($_SESSION["user"]); ?>
                            </select>
                        </div>
                        <input id="submit-type" type="submit" class="btn btn-primary btn-block" name="fase1" value="¡Esta es mi carta!">
                    </form>
                </article>
            <?php }
        } ?>
    </body>
</html>