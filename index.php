<?php
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);
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
    <script src="../scripts/phone-widget.js"></script>  <!-- Cargar el script del widget -->
    
    <script>
        // Realizar la petición al script PHP para obtener la respuesta de la API
        fetch('../api/zadarma.php')
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta de la API:', data);  // Mostrar en consola

                // Mostrar el resultado en el HTML
                const displayData = typeof data === 'object' ? JSON.stringify(data, null, 2) : data;
                document.getElementById('api-response').innerText = displayData;
            })
            .catch(error => console.error('Error en la petición:', error));
    </script>
</body>
</html>
