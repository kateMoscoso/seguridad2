<?php
if ($_SESSION['autenticado'] != 'correcto' ) {
  header ("Location:login.php");
  exit;
}
?>