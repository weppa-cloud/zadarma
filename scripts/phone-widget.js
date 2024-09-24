document.addEventListener('DOMContentLoaded', function() {
    // Realiza una solicitud para obtener la clave WebRTC desde el servidor
    fetch('/api/zadarma.php')
        .then(response => response.json())  // Parsear la respuesta como JSON
        .then(data => {
            if (data.key) {
                // Inicializar el widget de Zadarma con la clave obtenida
                zadarmaWidgetFn(
                    data.key,               // YOUR_KEY: la clave generada por la API
                    '89075',             // YOUR_SIP: el número SIP o extensión
                    'square',               // Diseño del widget
                    'es',                   // Idioma del widget
                    true,                   // Activar el modo silencioso
                    {right: '10px', bottom: '5px'}  // Posición del widget
                );
            } else {
                console.error('Error al obtener la clave WebRTC:', data);
            }
        })
        .catch(error => console.error('Error en la solicitud:', error));
});
