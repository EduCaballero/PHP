<?php

require_once 'bbdd_user.php';
echo "<form action='batalla.php' method='POST'>";
echo "Escoge tu carta: ";
echo "<select name='carta'>";
$cartas = selectCarta();
while ($fila = mysqli_fetch_array($cartas)) {
    extract($fila);
    echo "<option value='$dni'>$dni $name";
    echo "</option>";
}
echo "</select>";
echo "<input type='submit' value='Modificar'>";
echo "</form>";

