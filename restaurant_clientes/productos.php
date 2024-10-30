<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $_POST['disponible'], $_POST['imagen']);
    if ($id) {
        header("Location: index.php?mensaje=Producto creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el producto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h1>Agregar Producto</h1>
    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Precio: <input type="number" step="0.01" name="precio" required></label>
        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Categoría: <input type="text" name="categoria" required></label>
        <label>Disponible: <input type="checkbox" name="disponible" value="1"></label>
        <label>Imagen: <input type="text" name="imagen" required></label>
        <input type="submit" value="Crear Producto">
        <a href="index.php" class="button">Volver</a>
    </form>    
</body>
</html>