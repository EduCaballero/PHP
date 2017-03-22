<!DOCTYPE html>
<!--
Página de login
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tittle</title>
    </head>
    <body>
        <form action="" method="POST">
            <p>Email: <input type="email" name="email"></p>
            <p>Password: <input type="password" name="pass"></p>
            <p>Login<input type="submit" name="entrar" value="Login"></p>
        </form>
        <?php
        require_once 'bbdd_user.php';
        if(isset($_POST["entrar"])){
            $email=$_POST["email"];
            $pass=$_POST["pass"];
            if (validateUser($email, $pass)){
                //Olé! El usuario a hecho login
                //Abrimos sesión
                session_start();
                //Guardamos el email en una variable de session
                $_SESSION["user"]=$email; //le llamamos user pero le llamamos como nos de la gana
                //Comprobamos el tipo de para dirigir al user
                $tipo=  getTypeByEmail($email);
                //Guardamos el tipo de usuario en la variable de sesión
                $_SESSION["tipo"]= $tipo;
                if($tipo=="user"){
                    //Dirigimos al usuario a su página
                    header("Location: home_user.php");
                }else if($tipo=="admin"){
                    header("Location: home_admin.php");
                }
            }else{
                echo"<p>Usuario o contraseña incorrectos.</p>";
            }
        }
        ?>
    </body>
</html>
