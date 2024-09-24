<?php
// Incluir la configuración actual
$config = include '../config/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de Telefonía</title>
</head>
<body>
    <h1>Configuración de Telefonía Zadarma</h1>

    <!-- Formulario para ingresar API Key y API Secret -->
    <form action="/api/save_config.php" method="POST">
        <label for="api_key">Clave API:</label>
        <input type="text" id="api_key" name="api_key" value="<?php echo $config['api_key']; ?>" required>

        <label for="api_secret">Secreto API:</label>
        <input type="password" id="api_secret" name="api_secret" value="<?php echo $config['api_secret']; ?>" required>

        <!-- Otros campos de configuración pueden ir aquí -->
        <button type="submit">Guardar Configuración</button>
    </form>

    <?php
    // Mostrar mensaje de éxito si la configuración fue guardada
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo "<p>Configuración guardada exitosamente.</p>";
    }
    ?>
</body>
</html>
