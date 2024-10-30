<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/funciones.php';

$cliente = [
    'nombre' => '',
    'correo' => '',
    'telefono' => '',
    'direccion' => '',
    'ciudad' => ''
];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = [
        'nombre' => $_POST['nombre'],
        'correo' => $_POST['correo'],
        'telefono' => $_POST['telefono'],
        'direccion' => $_POST['direccion'],
        'ciudad' => $_POST['ciudad']
    ];

    if (empty($cliente['nombre']) || empty($cliente['correo'])) {
        $mensaje = 'Por favor, completa los campos obligatorios.';
    } else {
        try {
            $cliente['fecha_registro'] = date('Y-m-d');
            $db->clientes->insertOne($cliente);
            header('Location: index.php');
            exit;
        } catch (Exception $e) {
            $mensaje = 'Error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Nuevo Cliente</h2>

        <?php if ($mensaje): ?>
            <div class="alert alert-danger">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo *</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($cliente['correo']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono']); ?>">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>">
            </div>

            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($cliente['ciudad']); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
            <a href="../index.php">Volver</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>