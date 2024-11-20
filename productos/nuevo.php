<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    agregarProducto($productosCollection, $nombre, $descripcion, $precio, $categoria);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
    <link rel="stylesheet" type="text/css" href="../productos/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">    
</head>
<body>
    <h1 style="color: #e2e8ed; text-align: center; font-size: 2.5em; margin-bottom: 20px;">Añadir Producto</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea style="width: 700px" id="descripcion" name="descripcion" required></textarea><br>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br>
        
        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required>
        
        <button type="submit">Añadir</button>
        <a class="btn btn-secondary" href="index.php">Volver</a>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
