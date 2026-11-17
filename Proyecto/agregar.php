<?php
$conexion = new mysqli("localhost", "root", "", "huella_feliz");
$conexion->set_charset("utf8");
if($_POST){
  $sql = "INSERT INTO mascotas (nombre,especie,raza,edad,sexo,tamano,descripcion,foto) VALUES ('$_POST[nombre]','$_POST[especie]','$_POST[raza]','$_POST[edad]','$_POST[sexo]','$_POST[tamano]','$_POST[descripcion]','$_POST[foto]')";
  $conexion->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Registrar</title><link rel="stylesheet" href="style.css"></head>
<body><div class="form-box"><h2>🐶 Registrar Mascota</h2>
<form method="POST">
<input name="nombre" placeholder="Nombre" required>
<select name="especie"><option>Perro</option><option>Gato</option><option>Otro</option></select>
<input name="raza" placeholder="Raza">
<input name="edad" placeholder="Edad Ej: 1 año">
<select name="sexo"><option>Macho</option><option>Hembra</option></select>
<select name="tamano"><option>Pequeño</option><option>Mediano</option><option>Grande</option></select>
<textarea name="descripcion" placeholder="Descripción / carácter"></textarea>
<input name="foto" placeholder="Link de foto (URL)">
<button class="btn">Guardar Mascota</button>
<a href="index.php">Cancelar</a>
</form></div></body></html>