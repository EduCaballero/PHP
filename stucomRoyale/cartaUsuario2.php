<?php

session_start();
if (isset($_SESSION["user"])) {

    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        require_once 'bbdd.php';

        if (isset($_POST['carta'])) {
            $nombre = $_POST['player'];
            $carta = $_POST['card'];
            
            $mirarNombre = mirarNombre($nombre);//Borrar esto ya que ya lo hago con el propio insertNewCard

            if ($mirarNombre == TRUE) {//Borrar esto ya que ya lo hago con el propio insertNewCard
                echo "<h2>Ya tienes la carta, por tanto, la carta sube de nivel.</h2>";
                echo '<form method="" action="home_admin.php"> <button type="submit">Inicio</button> </form>';
                newCardLevel($nombre, $carta);
            } else{
            insertNewCard($carta, $nombre);
            
            }
            
        } else {
            // Formulario para que escoja la carta
            echo "<form action='' method='POST'>";
            echo "Selecciona la carta: ";
            echo "<select name='card'>";
            // Leemos los nombres de la bbdd
            $cards = selectAllCards();
            // Vamos extrayendo los nombres y añadiendolos a la lista
            while ($fila = mysqli_fetch_array($cards)) {
                extract($fila);
                echo "<option value='$name'>$name</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='carta' value='Seleccionar'>";
            echo "</form>";
        }
    } else {
        echo "<h2>Acceso sólo para administradores.</h2>";
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
    }
} else {
    echo "<h2>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   


/*<?php

session_start();
if (isset($_SESSION["user"])) {

    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        require_once 'bbdd.php';

        if (isset($_POST['jugador'])) {      
            
            if (isset($_POST['carta'])) {
            $nombre = $_POST['player'];
            $carta = $_POST['carta'];
            
            
            }else{
            // Formulario para que escoja la carta
            echo "<form action='' method='POST'>";
            echo "Selecciona la carta: ";
            echo "<select name='card'>";
            // Leemos los nombres de la bbdd
            $cards = selectAllCards();
            // Vamos extrayendo los nombres y añadiendolos a la lista
            while ($fila = mysqli_fetch_array($cards)) {
                extract($fila);
                echo "<option value='$name'>$name</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='carta' value='Seleccionar'>";
            echo "</form>";


            $mirarNombre = mirarNombre($nombre);

            if ($mirarNombre == TRUE) {
                echo "<h2>El nombre de la carta ya existe.</h2>";
                echo '<form method="" action="home_admin.php"> <button type="submit">Inicio</button> </form>';
            } else{
            insertarCarta($nombre, $tipo, $calidad, $vida, $danyo, $elixir);}
        } 
    } else {
        echo "<h2>Acceso sólo para administradores.</h2>";
        echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
    }
} else {
    echo "<h2>No hay admin valido.</h2>";
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   */