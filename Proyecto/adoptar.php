<?php
$conexion = new mysqli("localhost", "root", "", "huella_feliz");
$conexion->set_charset("utf8");
$id = $_GET['id'];
$m = $conexion->query("SELECT * FROM mascotas WHERE id=$id")->fetch_assoc();
if($_POST){
  $conexion->query("INSERT INTO adopciones (mascota_id,nombre_adoptante,telefono,correo,mensaje) VALUES ($id,'$_POST[nombre]','$_POST[telefono]','$_POST[correo]','$_POST[mensaje]')");
  $conexion->query("UPDATE mascotas SET estado='Adoptado' WHERE id=$id");
  echo "<script>alert('¡Solicitud enviada! Te contactaremos.'); window.location='index.php';</script>";
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Adoptar</title><link rel="stylesheet" href="style.css"></head>
<body><div class="form-box">
<img src="<?php echo $m['foto']; ?>" style="width:100%;border-radius:12px">
<h2>Adoptar a <?php echo $m['nombre']; ?> ❤️</h2>
<form method="POST">
<input name="nombre" placeholder="Tu nombre completo" required>
<input name="telefono" placeholder="Teléfono / WhatsApp" required>
<input name="correo" placeholder="Correo">
<textarea name="mensaje" placeholder="¿Por qué quieres adoptarlo?"></textarea>
<button class="btn">Enviar Solicitud de Adopción</button>
</form></div></body></html>