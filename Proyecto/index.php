<?php
$conexion = new mysqli("localhost", "root", "", "huella_feliz");
if ($conexion->connect_error) { die("Error de conexión: " . $conexion->connect_error); }
$conexion->set_charset("utf8");
$buscar = $_GET['buscar'] ?? '';
$sql = "SELECT * FROM mascotas WHERE nombre LIKE '%$buscar%' OR especie LIKE '%$buscar%' ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><title>Huella Feliz</title>
<link rel="stylesheet" href="style.css"></head>
<body>
<header><h1>🐾 Huella Feliz</h1><p>Adopción de Mascotas - CECyTE Villa del Sol</p>
<nav><a href="index.php">Inicio</a> <a href="agregar.php" class="btn">+ Registrar Mascota</a></nav>
<form class="buscador"><input type="text" name="buscar" placeholder="Buscar perro, gato, nombre..." value="<?php echo $buscar; ?>">
<button>Buscar</button></form></header>

<main class="grid">
<?php while($m = $resultado->fetch_assoc()){ ?>
<div class="card">
  <img src="<?php echo $m['foto']; ?>">
  <span class="badge"><?php echo $m['estado']; ?></span>
  <h2><?php echo $m['nombre']; ?></h2>
  <p><b><?php echo $m['especie']; ?> | <?php echo $m['raza']; ?></b><br><?php echo $m['edad']; ?> • <?php echo $m['sexo']; ?> • <?php echo $m['tamano']; ?></p>
  <p><?php echo $m['descripcion']; ?></p>
  <div class="acciones">
    <a href="adoptar.php?id=<?php echo $m['id']; ?>" class="btn-adoptar">❤️ Adoptar</a>
    <a href="editar.php?id=<?php echo $m['id']; ?>" class="btn-editar">Editar</a>
    <a href="eliminar.php?id=<?php echo $m['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar a <?php echo $m['nombre']; ?>?')">Eliminar</a>
  </div>
</div>
<?php } ?>
</main>
<footer><p>Proyecto Final - Implementa Páginas Web - Prof. Rubén Naranjo Govea - Grupo 5 PGM</p></footer>
</body></html>