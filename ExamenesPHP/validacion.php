<html>
<head>
	<meta charset="UTF-8">
	<title>Ex</title>
</head>
<body>
	<?php 
	session_start();
        $user1="admin";
        $user2="Stucom";
        $user3="Usuario";
        $user4="DAW1M";
        $pass1="admin";
        $pass2="Stucom2017";
        $pass3="1234";
        $pass4="Aula36";
        
	$_SESSION["usuario"] = $_POST["username"];
	$_SESSION["password"] = $_POST["pass"];
        
        if ($_SESSION["usuario"]==$user1 && $_SESSION["password"]==$pass1){
            $hora= date ("h:i:s");
            $fecha= date ("j/n/Y");
            echo"hola $user1, son las $hora del $fecha ";
        }
        
        else if ($_SESSION["usuario"]==$user2 && $_SESSION["password"]==$pass2){
            $hora= date ("h:i:s");
            $fecha= date ("j/n/Y");
            echo"hola $user2, son las $hora del $fecha ";
        }
        
        else if ($_SESSION["usuario"]==$user3 && $_SESSION["password"]==$pass3){
            $hora= date ("h:i:s");
            $fecha= date ("j/n/Y");
            echo"hola $user3, son las $hora del $fecha ";
        }
        
        else if ($_SESSION["usuario"]==$user4 && $_SESSION["password"]==$pass4){
            $hora= date ("h:i:s");
            $fecha= date ("j/n/Y");
            echo"hola $user4, son las $hora del $fecha ";
        }
        
        else{
            echo"Usuario o contraseña incorrecto";
            ?>
            <form action="Ex03.html" method="POST">
		<input type="submit" value="VOLVER">
            </form>
            <?php         
        }

	?>
	
</body>
</html>