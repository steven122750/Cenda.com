<?php
// Incluir el archivo de configuración de la base de datos
include 'config.php'; // Asegúrate de tener un archivo config.php con la configuración de la base de datos

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombres = $_POST["nombres"];
    $documento = $_POST["documento"];
    $cargo = $_POST["cargo"];
    $sede = $_POST["sede"];

    // Preparar la consulta SQL
    $sql = "INSERT INTO funcionarios (nombre, cargo, documento, sede) VALUES (?, ?, ?, ?)";

    // Preparar la declaración
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("ssss", $nombres, $documento, $cargo, $sede);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Funcionario registrado con éxito.";
        } else {
            echo "Error al registrar el funcionario: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>







