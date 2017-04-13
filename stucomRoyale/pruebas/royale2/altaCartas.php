<?php
session_start();
if(isset($_SESSION["user"])){
    
$tipo = $_SESSION["tipo"];
if($tipo == 1){
require_once 'bbdd_user.php';

if (isset($_POST['alta'])) {
   $nombre = $_POST['nombre'];
   $tipo = $_POST['tipo'];
   $calidad= $_POST['calidad'];
   $vida = $_POST['vida'];
   $danyo = $_POST['danyo'];
   $elixir = $_POST['elixir'];
   
   $mirarNombre = mirarNombre($nombre);
   
   if($mirarNombre==TRUE){
       echo "<h1>El nombre de la carta ya existe.</h1>";
        echo '<img src="img/Sad_Face.png" style="width:350px;height: 300px;"/>';
        echo '<form method="" action="home_admin.php"> <button type="submit">Inicio</button> </form>';
   }else insertarCarta($nombre, $tipo, $calidad, $vida, $danyo, $elixir);
  
} else {
    echo " <link href='style2.css' rel='stylesheet' type='text/css'/>";
    echo "<img src='img/Clash_Royale_Logo.png' style='width:500px;height: 200px;'/>";
    echo "<form action ='' method='POST'>";
    echo "Nombre: <input type='text' name='nombre' maxlength='30' required><br>";
    echo "Tipo: <select name='tipo'> <option value='tropa'>Tropa</option> <option value='hechizo'>Hechizo</option> <option value='estructura'>Estructura</option> </select><br>";
    echo "Calidad: <select name='calidad'> <option value='comun'>Comun</option> <option value='especial'>Especial</option> <option value='epica'>Epica</option> <option value='legendaria'>Legendaria</option> </select><br>";
    echo "Vida: <select name='vida'> <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option> <option value='5'>5</option> <option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option> <option value='11'>11</option> <option value='12'>12</option> <option value='13'>13</option> <option value='14'>14</option> <option value='15'>15</option> <option value='16'>16</option> <option value='17'>17</option> <option value='18'>18</option> <option value='19'>19</option> <option value='20'>20</option> </select> <br>";
    echo "Daño: <select name='danyo'> <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option> <option value='5'>5</option> <option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option> <option value='11'>11</option> <option value='12'>12</option> <option value='13'>13</option> <option value='14'>14</option> <option value='15'>15</option> <option value='16'>16</option> <option value='17'>17</option> <option value='18'>18</option> <option value='19'>19</option> <option value='20'>20</option> </select><br> ";
    echo "Elixir: <select name='elixir'> <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option> <option value='5'>5</option> <option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option> </select> <br>";
    echo "<input type='submit' name='alta' value='Alta'>";
    echo "</form>";
}
}else{
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>No puedes aceder a esta pagina si no eres administrador.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}
} else {
    echo '<link href="style2.css" rel="stylesheet" type="text/css"/>';
    echo "<h1>No hay usuario valido.</h1>";
    echo '<img src="img/Angry_Face.png" style="width:250px;height: 300px;"/>';
    echo '<form method="" action="index.php"> <button type="submit">Home</button> </form>';
}   