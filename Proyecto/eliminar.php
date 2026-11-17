<?php
$conexion = new mysqli("localhost", "root", "", "huella_feliz");
$conexion->query("DELETE FROM mascotas WHERE id=".$_GET['id']);
header("Location: index.php");
?>