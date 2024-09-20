<?php
// Si el parámetro 'zd_echo' está presente en la URL, el script termina y devuelve el valor del parámetro
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);


// Hacer una petición GET a un endpoint
$url = "https://api.zadarma.com/v1/webrtc/get_key"; // Reemplaza con el URL del endpoint
$response = file_get_contents($url);

// Verificar si la respuesta es válida
if ($response === FALSE) {
    $apiData = "Error al realizar la petición.";
} else {
    // Procesar la respuesta (ej. si es JSON)
    $apiData = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zadarma con PHP</title>
</head>
<body>
    <h1><?php echo "Zadarma - PHP"; ?></h1>

    <!-- Mostrar la respuesta de la API -->
    <h2>Datos de la API:</h2>
    <pre><?php print_r($apiData); ?></pre>

    <!-- Agrega aquí los scripts de Zadarma -->
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-lib.js?sub_v=1"></script>
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-fn.js?sub_v=1"></script>
    <script>
        if (window.addEventListener) {
            window.addEventListener('load', function() {
                zadarmaWidgetFn(
                    'ea0ff7c43545f6d0d97a', 
                    '112571-102', 
                    'square', 
                    'es', 
                    true, 
                    {right: '10px', bottom: '5px'}
                );
            }, false);
        } else if (window.attachEvent) {
            window.attachEvent('onload', function() {
                zadarmaWidgetFn(
                    'ea0ff7c43545f6d0d97a', 
                    '112571-102', 
                    'square', 
                    'es', 
                    true, 
                    {right: '10px', bottom: '5px'}
                );
            });
        }
    </script>
    <!-- El resto de tu HTML y JavaScript -->
    <script src="/js/scripts.js"></script>
</body>
</html>

