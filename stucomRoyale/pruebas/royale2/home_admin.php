<?php
session_start();
if(isset($_SESSION["user"])){
    
$tipo = $_SESSION["tipo"];
if($tipo == 1){
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style4.css" rel="stylesheet" type="text/css"/>
        <title>Home Page Administrator</title>
    </head>
    <body>
         <?php
            echo '<img src="img/Clash_Royale_Logo.png" style="width:400px;height: 150px;"/>';
            echo '<form method="" action="altaCartas.php"> <button type="submit">Alta Cartas</button> </form>';
            echo '<form method="" action="ranking.php"> <button type="submit">Ranking</button> </form>';
            echo '<form method="" action="borrarUsuario.php"> <button type="submit">Borrar Usuario</button> </form>';
            echo '<form method="" action="cartaUsuario.php"> <button type="submit">Incorporar Cartas a usuarios</button> </form>'
                ?>
    </body>
</html>
<?php
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
?>