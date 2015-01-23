<html>
	<head>
		<title>XSS </title>
		<meta charset="UTF-8">
	</head>
<body>
	<br><br><br>
	<center>
		<img src="logo.png" width= 120 height= 60>
		<br><br><br>
		<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = get>
			<table bgcolor = 'lightgrey'> 
				<tr>
					<td> <input type = text name ='dato1'></td>
					<td> <input type=submit name = 'submit1' value ='DATO1'></td>
				</tr>
			</table><BR>
		</form>	
		<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = get>
			<table bgcolor = 'lightgrey'> 
				<tr>
					<td> <input type = text name ='dato2'></td>
					<td> <input type=submit name = 'submit2' value ='DATO2' ></td>
				</tr>
			</table><BR>
		</form>
		<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = get>
			<table bgcolor = 'lightgrey'> 		
				<tr>
					<td> <input type =radio name = 'dato3' value = "Rojo"> Rojo <input type =radio name='dato3' value = "Verde"> Verde </td> 
					<td> <input type=submit name = 'submit3' value ='DATO3'></td> 
				</tr>
			</table><BR>
		</form>
		<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = get>
			<table bgcolor = 'lightgrey'> 		
				<tr>
					<td> <input type =radio name = 'dato4' value = "blue"> Azul <input type =radio name='dato4' value = "yellow"> Amarillo </td> 
					<td> <input type=submit name = 'submit4' value ='DATO4'></td> 
				</tr>
			</table>
		</form>
		<br><br><br><br>
		
<?php
		if (isset($_GET['submit1'])){
			echo "Introducido el dato 1: " ;
			echo $_GET['dato1'];
			exit;
		}
		
		if (isset($_GET['submit2'])){
			echo "<form method = get> Introducido el dato 2: <input type = text name='nuevodato2' value = '{$_GET['dato2']}'>" ;
			exit;
		}
		
		if (isset($_GET['submit3'])){
			echo "Introducido el dato 3: " ;
			echo $_GET['dato3'];
			exit;
		}
		
		if (isset($_GET['submit4'])){
			echo "<p style=color:{$_GET['dato4']}> MI COLOR FAVORITO </p>";
			exit;
		}

?> 
	</center>
</body>
</html>

