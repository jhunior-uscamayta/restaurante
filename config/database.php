<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
    $database = $mongoClient->selectDatabase('restaurante');
    $clientesCollection = $database->selectCollection('clientes');
    $productosCollection = $database->selectCollection('productos'); 

} catch (Exception $e) {
    die("Error al conectar con MongoDB: " . $e->getMessage());
}
?>