<?php
session_start();
if (isset($_SESSION["user"])) {
     if ($_SESSION["tipo"] == 1) {
    
         if (isset($_GET["contador"])) {
            $contador = $_GET["contador"];
        } else {
            $contador = 0;
        }
        
        require_once 'bbdd_user.php';
        
        $total = allTotalEmails();
        
        $emails = allEmails($contador, 15);

echo "<table border='1'>";
echo "<caption>Bandeja de todos los Emails</caption>";
echo "<tr>";
echo "<th> Emisor </th><th> Receptor </th><th> Fecha </th><th> Asunto </th><th> Leido </th>";
echo "</tr>";
while ($fila = mysqli_fetch_array($emails)) {
    echo "<tr>";
    //extract($fila);
    //if($read=0)$leido = "No";
    //else $leido = "Si";
    echo "<td>". $fila["sender"]." </td><td>". $fila["receiver"]." </td><td>". $fila["date"]." </td><td>". $fila["subject"]."</td><td>". $fila["read"]."</td>";
    echo "</tr>";
}
echo "</table>";

if ($contador > 0) {
            echo "<a href='listadoMensajes.php?contador=".($contador-15)."'>Anterior </a>";
        }

        if (($contador + 15) <= $total) {
            echo "Mostrando de " . ($contador + 1) . " a " . ($contador + 15) . " de $total";
        } else {
            echo "Mostrando de " . ($contador + 1) . " a $total de $total";
        }
        
        if (($contador + 15) < $total) {
            echo "<a href='listadoMensajes.php?contador=".($contador+15)."'> Siguiente</a>";
        }
        echo '<form method="" action="home_admin.php"> <button type="submit">Home</button> </form>';
         
          }else {
    echo "<h1>Solo los administradores pueden ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     } else {
    echo "<h1>Debes hacer login para ver esta pagina.</h1>";
    echo '<form method="" action="index.php"> <button type="submit">Inicio</button> </form>';
}
     
     ?>
