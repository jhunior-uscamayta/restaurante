<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    agregarCliente($clientesCollection, $nombre, $correo, $telefono, $direccion);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Cliente</title>
    <link rel="stylesheet" type="text/css" href="../clientes/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <h1 style="color: #e2e8ed; text-align: center; font-size: 2.5em; margin-bottom: 20px;">Añadir Cliente</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        
        <button type="submit">Añadir</button>
        <a class="btn btn-secondary" href="index.php">Volver</a>
    </form>   
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
