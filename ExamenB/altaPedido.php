<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta pedido</title>
    </head>
    <body>

        <?php
        // Necesitamos incluir el fichero bbdd.php
        require_once('bbdd.php');
        
        if (isset($_POST["enviar"])) {
            
            // Recibimos los datos del formulario (POST)

            $plato = $_POST['plato'];
            $cliente = $_POST['cliente'];
            $cantidad = $_POST['cantidad'];
            

            // Insertamos datos en la bbdd
            insertarPedido($cliente, $plato, $cantidad);
            
            
        } else { 
            echo '
            <form action = "" method = "POST">
            Pedido<br>';
            echo'Selecciona el cliente al que pertenece el pedido:<select name="cliente">';       
            $clientePide = llamoClientes();
            while ($fila = mysqli_fetch_array($clientePide)) {
            extract($fila);
            echo "<option value='$nif'>$nombre $apellidos";
            echo '</option>';
            }
            echo '</select><br>';
            //-----------
            echo'Selecciona el plato:<select name="plato">';       
            $platoPide = llamoPlatos();
            while ($fila = mysqli_fetch_array($platoPide)) {
            extract($fila);
            echo "<option value='$idplato'>$nombre";
            echo '</option>';
            }
            echo '</select><br>';
            
            echo 'Cantidad: <input type = "number" name = "cantidad" required><br>';
            
            echo'<input type = "submit" name = "enviar" value = "Alta">';
            echo'</form>';
            }
            ?>  

            <form action="index.php" method="POST">
                <input type="submit" value="Volver">
            </form>            
      

    </body>
</html>