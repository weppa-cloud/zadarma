<?php
// Si el parámetro 'zd_echo' está presente en la URL, el script termina y devuelve el valor del parámetro
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zadarma con PHP</title>

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
</head>
<body>
    <h1><?php echo "Hola desde PHP"; ?></h1>

    <!-- El resto de tu HTML y JavaScript -->
    <script src="/js/scripts.js"></script>
</body>
</html>

