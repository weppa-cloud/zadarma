<?php
// Si el parámetro 'zd_echo' está presente en la URL, el script termina y devuelve el valor del parámetro
if (isset($_GET['zd_echo'])) exit($_GET['zd_echo']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zadarma con PHP</title>
</head>
<body>
    <h1><?php echo "Hola desde PHP"; ?></h1>

    <!-- El resto de tu HTML y JavaScript -->
    <script src="/js/scripts.js"></script>
</body>
</html>
