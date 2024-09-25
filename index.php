<?php
// Este archivo puede permanecer como está
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llamadas WebRTC</title>
</head>
<body>
    <h1>Realizar Llamadas WebRTC</h1>

    <!-- Cargar el widget de Zadarma -->
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-lib.js?sub_v=1"></script>
    <script src="https://my.zadarma.com/webphoneWebRTCWidget/v9/js/loader-phone-fn.js?sub_v=1"></script>
    <!-- <script src="/scripts/phone-widget.js"></script>  Inicializar el widget con la clave WebRTC -->
    <script>
        if (window.addEventListener) { 
            window.addEventListener('load', function() { 
            zadarmaWidgetFn('d1c5238d767471ddb64b', '89075', 'square' /*square|rounded*/, 'en' /*ru, en, es, fr, de, pl, ua*/, true, "{right:'10px',bottom:'5px'}"); 
            }, false); 
        } else if (window.attachEvent) { 
            window.attachEvent('onload', function(){ 
            zadarmaWidgetFn('d1c5238d767471ddb64b', '89075', 'square' /*square|rounded*/, 'en' /*ru, en, es, fr, de, pl, ua*/, true, "{right:'10px',bottom:'5px'}"); 
            }); 
        } 
</script>
</body>
</html>
