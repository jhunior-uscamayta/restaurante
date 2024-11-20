<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

$clientes = obtenerClientes($clientesCollection);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" type="text/css" href="../clientes/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 style="color: #e2e8ed; text-align: center; font-size: 2.5em; margin-bottom: 20px;">Lista de Clientes</h1>
    <a class="btn btn-primary" href="nuevo.php">Añadir Cliente</a>
    <a class="btn btn-secondary" href="../index.php">Regresar a Inicio</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['correo']; ?></td>
            <td><?php echo $cliente['telefono']; ?></td>
            <td><?php echo $cliente['direccion']; ?></td>
            <td>
                <a class="btn btn-warning" href="editar.php?id=<?php echo (string)$cliente['_id']; ?>">Editar</a>
                <a class="btn btn-danger" href="funciones.php?action=eliminar&id=<?php echo (string)$cliente['_id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
