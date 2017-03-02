<?php

//Página para escoger los Pokemon que se van a enfrentar

require_once 'bbddStukemon.php';

$entrenador1 = $_POST['entrenador1'];
$entrenador2 = $_POST['entrenador2'];

if($entrenador1==$entrenador2) {
    echo 'Un entrenador no puede luchar contra si mismo!<br>
        <form action="escogerContendientes.php" method="POST">
        <input type="submit" value="Volver">
        </form>';

}
else{

    echo "<form action='batalla.php' method='POST'>
        Escoge los Pokemon que se enfrenterán: <br>
        $entrenador1:<select name='pokemon1'>";
// Traemos los datos del primer entrenador
    $ent1 = pokemonEntrenador1($entrenador1);
    while ($fila = mysqli_fetch_array($ent1)) {
        extract($fila);
        echo "<option value='$name'>$name
            </option>";
    }
    echo "</select><br>";
    
    echo "$entrenador2:<select name='pokemon2'>";
    
// Traemos los datos del segundo entrenador
    $ent2 = pokemonEntrenador2($entrenador2);
    while ($fila = mysqli_fetch_array($ent2)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>
        <input type='hidden' name='entrenador1' value='$entrenador1'>
        <input type='hidden' name='entrenador2' value='$entrenador2'>
        <input type='submit' name='luchar' value='Ready?! Fight!'>
        </form>";
}
