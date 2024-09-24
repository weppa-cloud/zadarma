<?php
/*
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
*/

// Datos para la autenticación en la API de Zadarma
$api_key = 'c69ec05795c4e3a004ae';
$api_secret = '88f8485fb929f1191459';
$url = "https://api.zadarma.com/v1/webrtc/get_key";

// Generar una firma para la autenticación
$method = 'GET';
$date = gmdate('D, d M Y H:i:s \G\M\T');
$string_to_sign = $method . "\n\n\n" . $date . "\n/v1/webrtc/get_key";
$signature = base64_encode(hash_hmac('sha1', $string_to_sign, $api_secret, true));

// Configurar los encabezados para la solicitud
$headers = [
    "Authorization: ZD $api_key:$signature",
    "Date: $date"
];

// Inicializar cURL para hacer la petición GET
$ch = curl_init($url);

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ejecutar la petición
$response = curl_exec($ch);

// Verificar si ocurrió un error
if ($response === false) {
    $apiData = "Error: " . curl_error($ch);
} else {
    $apiData = json_decode($response, true);
}

// Cerrar cURL
curl_close($ch);
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
                    '89075', 
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
                    '89075', 
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

