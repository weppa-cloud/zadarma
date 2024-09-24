<?php
// Incluir la configuración de Zadarma
$config = include '../config/config.php';

// Generar una clave para WebRTC usando la API de Zadarma
$url = "https://api.zadarma.com/v1/webrtc/get_key";

// Generar la firma para la autenticación
$method = 'GET';
$date = gmdate('D, d M Y H:i:s \G\M\T');
$string_to_sign = $method . "\n\n\n" . $date . "\n/v1/webrtc/get_key";
$signature = base64_encode(hash_hmac('sha1', $string_to_sign, $config['api_secret'], true));

// Configurar los encabezados para la solicitud
$headers = [
    "Authorization: ZD {$config['api_key']}:$signature",
    "Date: $date"
];

// Inicializar cURL para hacer la petición GET
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ejecutar la petición y obtener la respuesta
$response = curl_exec($ch);

// Verificar si ocurrió un error
if ($response === false) {
    echo json_encode(["status" => "error", "message" => "Error: " . curl_error($ch)]);
} else {
    $apiData = json_decode($response, true);
    
    // Verificar si el JSON de respuesta es correcto
    if (json_last_error() === JSON_ERROR_NONE) {
        echo json_encode($apiData);
    } else {
        echo json_encode(["status" => "error", "message" => "Error en el JSON de la API de Zadarma"]);
    }
}

// Cerrar cURL
curl_close($ch);
?>
