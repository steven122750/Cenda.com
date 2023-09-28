<?php

session_start();

include("db.php"); // Incluye el archivo de conexión a la base de datos

if (isset($_GET['numeroPrueba'])) {
    $numeroPrueba = $_GET['numeroPrueba'];

    // Consulta la ruta de la foto en la base de datos
    $query = "SELECT fotoResultado FROM prueba WHERE numeroPrueba = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $numeroPrueba);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);

    if ($row['fotoResultado'] !== null) {
        $fotoRuta = $row['fotoResultado'];

        // Muestra la imagen en la página con un ancho del 100% y altura automática
        echo '<img src="' . $fotoRuta . '" alt="Foto de resultado" style="width: 100%; height: auto;">';
    } else {
        $_SESSION['message'] = 'No existe evidencia para esta prueba';
        $_SESSION['message_type'] = 'danger';
        header("location: moduloInfoPruebas.php");
    }
} else {




}
?>


