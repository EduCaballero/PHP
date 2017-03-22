<?php
session_start();
if (isset($_SESSION["user"])){
    //Nos aseguramos que el usuario sea admin y cogemos el tipo de la variable de session
    $tipo=$_SESSION["tipo"];
    if($tipo==admin){
?>

<!DOCTYPE html>
<!--
Página del admin para dar de alta juegos y demás
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
<?php

?>