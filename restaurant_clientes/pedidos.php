<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarPedido($_POST['id_producto'], $_POST['cantidad'], $_POST['precio_unitario'], $_POST['notas']);
    if ($id) {
        header("Location: index.php?mensaje=Pedido creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el pedido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Pedido</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h1>Agregar Pedido</h1>
    <form method="POST">
        <label>ID Producto: <input type="text" name="id_producto" required></label>
        <label>Cantidad: <input type="number" name="cantidad" required></label>
        <label>Precio Unitario: <input type="number" step="0.01" name="precio_unitario" required></label>
        <label>Notas: <textarea name="notas" required></textarea></label>
        <input type="submit" value="Crear Pedido">
        <a href="index.php" class="button">Volver</a>
    </form>
</body>
</html>