<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Datos</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="id">ID del Registro:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Buscar</button>
    </form>
    
    <?php if (isset($mensaje)): ?>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <?php if ($dato): ?>
        <h2>Detalles del Registro</h2>
        <form action="index.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($dato->id); ?>">
            <label for="campo1">Campo1:</label>
            <input type="text" id="campo1" name="campo1" value="<?php echo htmlspecialchars($dato->campo1); ?>" required><br><br>
            
            <label for="campo2">Campo2:</label>
            <input type="text" id="campo2" name="campo2" value="<?php echo htmlspecialchars($dato->campo2); ?>" required><br><br>

            <button type="submit" name="update">Actualizar</button>
        </form>
    <?php elseif ($datoId): ?>
        <p>Registro no encontrado.</p>
    <?php endif; ?>
</body>
</html>
