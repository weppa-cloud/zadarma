<?php
// api/zadarma.php

$config = include '../config/config.php';

// Datos para la autenticación en la API de Zadarma
$url = "https://api.zadarma.com/v1/webrtc/get_key";

// Generar una firma para la autenticación
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

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Ejecutar la petición
$response = curl_exec($ch);

// Verificar si ocurrió un error
if ($response === false) {
    $apiData = ["error" => "Error: " . curl_error($ch)];
} else {
    $apiData = json_decode($response, true);
}

// Cerrar cURL
curl_close($ch);

// Codificar los datos como JSON
header('Content-Type: application/json');
echo json_encode($apiData);
?>
