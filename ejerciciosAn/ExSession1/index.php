<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <h1>Login</h1>
        <form action="validar.php" method="POST">
            Nombre de Usuario: <input type="text" placeholder="Nombre de Usuario" name="username"/>
            <br/>
            Password: <input type="password" placeholder="Password" name="pass"/>
            <br/>
            Edad: <input type="number" placeholder="Edad" name="edad"/>
            <br/>
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>