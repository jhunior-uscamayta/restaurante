<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

$productos = obtenerProductos($productosCollection);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" type="text/css" href="../productos/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 style="color: #e2e8ed; text-align: center; font-size: 2.5em; margin-bottom: 20px;">Lista de Productos</h1>
    <a class="btn btn-primary" href="nuevo.php">Añadir Producto</a>
    <a class="btn btn-secondary" href="../index.php">Regresar a Inicio</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['categoria']; ?></td>
            <td>
                <a class="btn btn-warning" href="editar.php?id=<?php echo (string)$producto['_id']; ?>">Editar</a>
                <a class="btn btn-danger" href="funciones.php?action=eliminar&id=<?php echo (string)$producto['_id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
