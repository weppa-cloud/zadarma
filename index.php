<?php
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);

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

// Codificar los datos como JSON
echo json_encode($apiData);
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
    <pre id="api-response"></pre>

    <!-- Agrega aquí los scripts de Zadarma -->
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-lib.js?sub_v=1"></script>
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-fn.js?sub_v=1"></script>
    <script>
        // Realizar la petición al script PHP para obtener la respuesta de la API
        fetch('index.php')
            .then(response => {
                // Intentar convertir la respuesta a JSON
                return response.text().then(text => {
                    try {
                        // Intentar parsear el texto a JSON
                        const jsonData = JSON.parse(text);
                        return jsonData;
                    } catch (error) {
                        // Si no es JSON, devolver el texto original
                        return text;
                    }
                });
            })
            .then(data => {
                console.log('Respuesta de la API:', data);  // Mostrar en consola

                // Mostrar el resultado en el HTML
                const displayData = typeof data === 'object' ? JSON.stringify(data, null, 2) : data;
                document.getElementById('api-response').innerText = displayData;
            })
            .catch(error => console.error('Error en la petición:', error));

        // Inicializar el widget de Zadarma
        if (window.addEventListener) {
            window.addEventListener('load', function() {
                zadarmaWidgetFn(
                    'c69ec05795c4e3a004ae', 
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
                    'c69ec05795c4e3a004ae', 
                    '89075', 
                    'square', 
                    'es', 
                    true, 
                    {right: '10px', bottom: '5px'}
                );
            });
        }
    </script>
</body>
</html>
