
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta cocineros</title>
    </head>
    <body>
       <form action="alta.php" method="POST">
            Nombre: <input type="text" name="nombre" required>
            Teléfono: <input type="text" name="telefono" required><br /> 
            Sexo:
            <label>Masculino</label><input type="radio" name="sexo" value="masculino">
            <label>Femenino</label><input type="radio" name="sexo" value="femenino"><br /> 
            Edad: <input type="number" name="edad" min="18" max="65" required><br /> 
            Experiencia: <input type="number" name="experiencia" min="0" max="60" required><br /> 
            Especialidad: 
            <select name="especialidad" required>    
            <option value="postres" selected="selected">Postres</option>
            <option value="entrantes">Entrantes</option>
            <option value="platoprincipal">Plato principal</option>
            </select><br /> 
            
            <input type="submit" name="enviar" value="Alta">
        </form>
    </body>
</html>
