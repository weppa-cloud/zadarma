<?php
// Incluir la configuración actual
$configFile = '../config/config.php';
$config = include $configFile;

// Verificar si se han enviado los datos desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger las claves del formulario
    $api_key = $_POST['api_key'];
    $api_secret = $_POST['api_secret'];

    // Actualizar el archivo de configuración
    $config['api_key'] = $api_key;
    $config['api_secret'] = $api_secret;

    // Guardar las nuevas claves en el archivo config.php
    file_put_contents($configFile, '<?php return ' . var_export($config, true) . ';');

    // Redirigir al usuario a la página de configuración con un mensaje de éxito
    header('Location: /admin/configuracion-telefonia.php?success=true');
    exit;
} else {
    echo "Método no permitido";
}
?>
