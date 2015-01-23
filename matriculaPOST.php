<HTML>
	<HEAD>
		<title>Matrícula de asignaturas</title>
		<meta charset="UTF-8">
	</HEAD>
<body>
<CENTER>	
<?php
	session_start();
	include ("includes/autenticado.php");
	if (isset($_POST['Envio'])){
		$matricula = 0;
		if (isset($_POST['SPW'])) $matricula += 64;
		if (isset($_POST['SGC'])) $matricula += 32;
		if (isset($_POST['DAWDCA'])) $matricula += 16;
		include ("includes/abrirbd.php");
		$sql = "UPDATE usuarios SET permisos = {$matricula} WHERE user ='{$_SESSION['user']}'";
        if(!mysqli_query($link, $sql)){
			echo "<BR><BR><h3>Proceso de Matriculacion incorrecto</h3><<BR><BR>";
		} else {
			echo "<BR><BR><h3>Matricula correcta</h3><BR><BR>";
		}
		mysqli_close($link);
?>
		<A href= 'MasterWeb.php'> Volver a inicio </A>

<?php
	} else {
?>
			<img src="logo.png" width= 120 height= 60>
			<br><br><br>
			<H2> Matrícula del alumno: 
<?php
			echo $_SESSION['user'];
?> 
			</H2><BR><BR>
                        <FORM name="matricula" method=post action=matriculaPOST.php>
				<TABLE>
					<TR>
						<TD align=right><INPUT type="checkbox" name="SPW" value="Si"></TD>
						<TD align=left> Seguridad en la Programación Web</TD>
					</TR>
					<TR>
						<TD align=right><INPUT type="checkbox" name="SGC" value="Si"></TD>
						<TD align=left> Sistemas de Gestores de Contenido</TD>
					</TR>
					<TR>
						<TD align=right><INPUT type="checkbox" name="DAWDCA" value="Si"></TD>
						<TD align=left> Desarrollo de Aplicaciones Web Distribuidas de Código Abierto</TD>
					</TR>
				</TABLE><BR>
				<INPUT type="submit" name="Envio" value="Enviar">
			</FORM>
		</CENTER>
<?php
	}
?>
</BODY>
</HTML>