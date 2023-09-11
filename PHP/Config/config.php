<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto al servidor de tu base de datos
$username = "admin"; // Cambia esto a tu nombre de usuario de MySQL
$password = "1227"; // Cambia esto a tu contraseña de MySQL
$database = "`cendasoft`"; // Cambia esto a tu nombre de base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa a la base de datos!";
    // Puedes realizar operaciones de base de datos aquí
    // Por ejemplo, ejecutar consultas SQL o realizar otras tareas relacionadas con la base de datos.
}

// Cerrar la conexión cuando hayas terminado de usarla
$conn->close();
?>
