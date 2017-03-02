<?php
/*
 * Formulario para dar de alta un pokemon en la BBDD
 */
require_once 'bbdd.php';

// Comprobamos si se ha pulsado botón "alta"
if (isset($_POST['alta'])) {
   // Recogemos los datos del post
   $nombre = $_POST['nombre'];
   $tipo = $_POST['tipo'];
   $habilidad = $_POST['habilidad'];
   $ataque = $_POST['ataque'];
   $defensa = $_POST['defensa'];
   $velocidad = $_POST['velocidad'];
   $vida = $_POST['vida'];
   $nivel = $_POST['nivel'];
   $entrenador = $_POST['entrenador'];
   // Llamamos a la función que guarda los datos en la bbdd
   insertarPokemon($nombre, $tipo, $habilidad, $ataque, $defensa, $velocidad, $vida, $nivel, $entrenador);
} else {
// Formulario de alta pokemon
    echo "<form action ='' method='POST'>";
    echo "Nombre: <input type='text' name='nombre' required><br>";
    echo "Tipo: <select name='tipo'>
                <option name='tipo' value='agua'>Agua</option>
                <option name='tipo' value='fuego'>Fuego</option>
                <option name='tipo' value='lucha'>Lucha</option>
                <option name='tipo' value='planta'>Planta</option>
                <option name='tipo' value='psiquico'>Psiquico</option>
                <option name='tipo' value='siniestro'>Siniestro</option>
                <option name='tipo' value='electrico'>Electrico</option>
                </select><br>";
    echo "Habilidad: <select name='habilidad'>
                <option name='habilidad' value='despiste'>Despiste</option>
                <option name='habilidad' value='entusiasmo'>Entusiasmo</option>
                <option name='habilidad' value='fuga'>Fuga</option>
                <option name='habilidad' value='hedor'>Hedor</option>
                <option name='habilidad' value='insomnio'>Insomnio</option>
                <option name='habilidad' value='pararrayos'>Pararrayos</option>
                <option name='habilidad' value='sincronia'>Sincronia</option>
                </select><br>";
    echo "Nivel Ataque: <input type='number' name='ataque' required><br>";
    echo "Nivel Defensa: <input type='number' name='defensa' required><br>";
    echo "Velocidad: <input type='number' name='velocidad' required><br>";
    echo "Vida: <input type='number' name='vida' required><br>";
    //Recogemos los nombres de los entrenadores
    echo "Entrenador:<select name='entrenador'>";
    $entrenadores = AllEntrenadoresMenos6Pokemon();
    while ($fila = mysqli_fetch_array($entrenadores)) {
        extract($fila);
        echo "<option value='$name'>$name";
        echo "</option>";
    }
    echo "</select><br>";
    echo "<input type='hidden' name='nivel' value='0' required><br>";
    echo "<input type='submit' name='alta' value='Alta'>";
    echo "</form>";
}
