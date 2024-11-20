<?php
require_once __DIR__ . '/../config/database.php';

function obtenerProductos($productosCollection) {
    return $productosCollection->find()->toArray();
}

function agregarProducto($productosCollection, $nombre, $descripcion, $precio, $categoria) {
    $productosCollection->insertOne(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'categoria' => $categoria]);
}

function obtenerProducto($productosCollection, $id) {
    return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function editarProducto($productosCollection, $id, $nombre, $descripcion, $precio, $cantidad) {
    $productosCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'cantidad' => $cantidad // Asegúrate de incluir 'cantidad'
        ]]
    );
}

function eliminarProducto($productosCollection, $id) {
    $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

// Manejo de la eliminación
if (isset($_GET['action']) && $_GET['action'] == 'eliminar') {
    $id = $_GET['id'];
    eliminarProducto($productosCollection, $id);
    header('Location: index.php');
}
?>