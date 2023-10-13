<?php
if (isset($_POST['firma'])) {
    $firmaData = $_POST['firma'];

    // Puedes guardar $firmaData en una base de datos, guardarla en un archivo en el servidor, etc.
    // Por ejemplo, para guardarla en un archivo en el servidor:
    $rutaArchivo = 'firma.png';
    file_put_contents($rutaArchivo, base64_decode(explode(',', $firmaData)[1]));

    echo "Firma guardada exitosamente.";
} else {
    echo "No se ha recibido ninguna firma.";
}
?>
