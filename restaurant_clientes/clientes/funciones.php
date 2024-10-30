<?php
function obtenerClientes() {
    global $db;
    return $db->clientes->find([], ['sort' => ['nombre' => 1]]);
}

function agregarCliente($nombre, $correo, $telefono, $direccion) {
    global $db;
    return $db->clientes->insertOne([
        'nombre' => sanitizeInput($nombre),
        'correo' => sanitizeInput($correo),
        'telefono' => sanitizeInput($telefono),
        'direccion' => sanitizeInput($direccion)
    ])->getInsertedId();
}

function editarCliente($id, $nombre, $correo, $telefono, $direccion) {
    global $db;
    return $db->clientes->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], ['$set' => [
        'nombre' => sanitizeInput($nombre),
        'correo' => sanitizeInput($correo),
        'telefono' => sanitizeInput($telefono),
        'direccion' => sanitizeInput($direccion)
    ]]);
}

function eliminarCliente($id) {
    global $db;
    return $db->clientes->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
?>