<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
        require_once 'bbdd.php';
        if (isset($_POST['enviar'])) {
            $user = $_SESSION["user"];
            $contacto = $_POST['contacto'];
            $asunto = $_POST['asunto'];
            $mensaje = $_POST['mensaje'];
            enviarMensaje($user, $contacto, $asunto, $mensaje, $_SESSION["tipo"]);
            updateEvent($user, 'R');
        } else {
            echo "<form action='' method='POST'>";
            echo "Selecciona el destinatario del mensaje: ";
            echo "<select name='contacto'>";

            $contacts = selectUsuarios();

            while ($fila = mysqli_fetch_array($contacts)) {
                extract($fila);
                echo "<option value='$username'>$username</option>";
            }
            echo '</select>';
            ?>
            <br>
            <p>Asunto: <input type="text" name="asunto"></p><br>
            <textarea rows="5" cols="50" name="mensaje" >Introduce el mensaje que quieres enviar</textarea><br>
            <input type='submit' name='enviar' value='Enviar'>
            <?php
            echo "</form>";
        }
    } else {
        echo "<h1>Sólo los usuarios pueden acceder a esta página.</h1>";
        echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
    }
} else {
    echo "<h1>Sin login no entras!</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Ir al índice</button> </form>';
}
?>