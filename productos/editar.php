<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

// Verifica si el ID está presente en la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null || !preg_match('/^[0-9a-f]{24}$/', $id)) {
    die('ID de producto no válido');
}

try {
    $producto = obtenerProducto($productosCollection, $id);
    if (!$producto) {
        throw new Exception('Producto no encontrado');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        editarProducto($productosCollection, $id, $nombre, $descripcion, $precio, $cantidad);
        header('Location: index.php');
        exit;
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" type="text/css" href="../productos/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Editar Producto</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($producto['cantidad']); ?>" required>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
        
        <button type="submit">Actualizar</button>        
    </form>    
    <a class="btn btn-secondary" href="index.php">Volver</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>