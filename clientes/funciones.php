<?php
require_once __DIR__ . '/../config/database.php';

function obtenerClientes($clientesCollection) {
    return $clientesCollection->find()->toArray();
}

function agregarCliente($clientesCollection, $nombre, $correo, $telefono, $direccion) {
    $clientesCollection->insertOne(['nombre' => $nombre, 'correo' => $correo, 'telefono' => $telefono, 'direccion' => $direccion]);
}

function obtenerCliente($clientesCollection, $id) {
    return $clientesCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function editarCliente($clientesCollection, $id, $nombre, $correo, $telefono, $direccion) {
    $clientesCollection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => ['nombre' => $nombre, 'correo' => $correo, 'telefono' => $telefono, 'direccion' => $direccion]]);
}

function eliminarCliente($clientesCollection, $id) {
    $clientesCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

// Manejo de la eliminación
if (isset($_GET['action']) && $_GET['action'] == 'eliminar') {
    $id = $_GET['id'];
    eliminarCliente($clientesCollection, $id);
    header('Location: index.php');
}
?>