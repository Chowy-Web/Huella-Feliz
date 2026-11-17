<?php
$conexion = new mysqli("localhost", "root", "", "huella_feliz");
$conexion->set_charset("utf8");
$id = $_GET['id'];
if($_POST){
  $sql = "UPDATE mascotas SET nombre='$_POST[nombre]', especie='$_POST[especie]', raza='$_POST[raza]', edad='$_POST[edad]', sexo='$_POST[sexo]', tamano='$_POST[tamano]', descripcion='$_POST[descripcion]', foto='$_POST[foto]' WHERE id=$id";
  $conexion->query($sql); header("Location: index.php");
}
$m = $conexion->query("SELECT * FROM mascotas WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Editar</title><link rel="stylesheet" href="style.css"></head>
<body><div class="form-box"><h2>✏️ Editar a <?php echo $m['nombre']; ?></h2>
<form method="POST">
<input name="nombre" value="<?php echo $m['nombre']; ?>" required>
<input name="especie" value="<?php echo $m['especie']; ?>">
<input name="raza" value="<?php echo $m['raza']; ?>">
<input name="edad" value="<?php echo $m['edad']; ?>">
<input name="sexo" value="<?php echo $m['sexo']; ?>">
<input name="tamano" value="<?php echo $m['tamano']; ?>">
<textarea name="descripcion"><?php echo $m['descripcion']; ?></textarea>
<input name="foto" value="<?php echo $m['foto']; ?>">
<button class="btn">Actualizar</button>
<a href="index.php">Cancelar</a>
</form></div></body></html>