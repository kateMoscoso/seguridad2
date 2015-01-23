<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
	</head>
<body>

<?php
	session_start();
	if (isset($_GET['registro'])){
		header ("Location: registro.php");
	}
	
	if (isset($_GET['login'])){
		include ("includes/abrirbd.php");
        $sql = "SELECT * FROM usuarios WHERE user ='{$_GET['user']}'";
        $resultado = mysqli_query($link, $sql);
        
      	if (mysqli_num_rows ($resultado) == 1) {
        	$usuario = mysqli_fetch_assoc ($resultado);
			$password = $_GET['passwd'];
			$salt = $usuario['salt'];
			$hash = hash_pbkdf2("sha256", $password, $salt, 40);
			if ($hash == $usuario['password']) {
				$_SESSION['autenticado'] = 'correcto';
				$_SESSION['user'] = $usuario['user'];
				header ("Location:MasterWeb.php");
			} else {
				echo "<BR><BR><BR><CENTER>";
				echo "<h3>Autenticación incorrecta de ".$_GET['user']."</h3> <BR>";
				echo "<A href= 'login.php'> Volver a login </A>";
				echo "</CENTER>";
        	}  
        } else {
			echo "<BR><BR><BR><CENTER>";
			echo "<h3>Autenticación incorrecta de ".$_GET['user']."</h3> <BR>";
			echo "<A href= 'login.php'> Volver a login </A>";
			echo "</CENTER>";
        }
		mysqli_close($link);
	} else { 
?>
		<br><br><br>
		<center>
			<img src="logo.png" width= 120 height= 60>
			<br><br><br>
			<form action= '<?php "{$_SERVER['PHP_SELF']}"  ?>' method = get>
				<input type=submit name = 'registro' value = "REGISTRO"> <br><br><br>
				<table bgcolor = 'lightgrey'> 
					<tr>
						<td width= 100> Usuario: </td> 
						<td> <input type = text name ='user'></td>
					</tr>
					<tr>
						<td width= 100> Password: </td> 
						<td> <input type = password name ='passwd'></td>
					</tr>
				</table><br>
				<input type=submit name = 'login' value = "LOGIN"><br><br><br>
			</form>
			
<?php
	}
?>
		</center>
</body>
</html>