<?php
session_start();
if (isset($_SESSION["user"])) {
    if ($_SESSION["tipo"] == 0 || $_SESSION["tipo"] == 1) {
require_once 'bbdd_user.php';
if(isset($_POST['enviar'])){
    $user = $_SESSION["user"];
   $contacto = $_POST['contacto'];
   $asunto = $_POST['asunto'];
   $mensaje = $_POST['mensaje'];
    enviarMensaje($user, $contacto, $asunto, $mensaje, $_SESSION["tipo"]); 
    updateEvent($user, 'R');
}

else{
echo "<form action='' method='post'>"; 
echo "Selecciona el contacto para enviar el mensaje: ";
echo "<select name='contacto'>";

$contactos = selectUsuarios();

while ($fila = mysqli_fetch_array($contactos)) {
    extract($fila);
    echo "<option value='$username'>$username</option>";
}
echo '</select>';
?>
<br>
<p>Asunto: <input type="text" name="asunto"></p>
<br>
<!--<p>Texto: <input type="text" name="mensaje"></p>-->
<textarea rows="4" cols="50" name="mensaje" >Introduce el mensaje aqui...</textarea>
<br>
<input type='submit' name='enviar' value='Enviar'>
<?php
echo "</form>";
}

}else{
    echo "<h1>Solo los usuarios pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}

        }else{
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
?>