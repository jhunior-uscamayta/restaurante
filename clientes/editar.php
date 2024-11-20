<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

$id = $_GET['id'];
$cliente = obtenerCliente($clientesCollection, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    editarCliente($clientesCollection, $id, $nombre, $correo, $telefono, $direccion);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" type="text/css" href="../clientes/public/css/styles.css">
    
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $cliente['direccion']; ?>" required>
        
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>