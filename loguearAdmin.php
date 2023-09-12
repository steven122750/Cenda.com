<?php

include("db.php");
session_start();

/*$documentoAdmin = "0000"; // Reemplaza esto con el número de documento del administrador
$correoAdmin = "correo@example.com"; // Reemplaza esto con el correo del administrador
$nombreAdmin = "admin"; // Reemplaza esto con el nombre del administrador
$contrasena = "0000"; // Contraseña que deseas registrar

// Genera el hash de la contraseña
$hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);

// Inserta el nuevo administrador en la base de datos
$query = "INSERT INTO administradores (documento, correo, nombre, pass) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssss", $documentoAdmin, $correoAdmin, $nombreAdmin, $hashContraseña);

if (mysqli_stmt_execute($stmt)) {
    echo "Nuevo administrador registrado con éxito.";
} else {
    echo "Error al registrar el administrador.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
    
*/

if (isset($_POST["documentoAdmin"]) && isset($_POST["passAdmin"])) {
    $documentoAdmin = $_POST["documentoAdmin"];
    $passAdmin = $_POST["passAdmin"];

    // Consulta para obtener la contraseña hash almacenada en la base de datos
    $query = "SELECT documento, correo, nombre, pass FROM administradores WHERE documento = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $documentoAdmin);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $documento, $correo, $nombre, $hashedPassword);

    if (mysqli_stmt_fetch($stmt)) {
        // Verificar la contraseña proporcionada con la contraseña hash almacenada
        if (password_verify($passAdmin, $hashedPassword)) {
            // Contraseña válida, inicio de sesión exitoso
            $_SESSION["documentoAdmin"] = $documentoAdmin;
            $_SESSION["nombreAdmin"] = $nombre;
            // Puedes agregar más información a la sesión si es necesario

            // Redirigir al usuario a la página de inicio o a donde desees
            header("Location: Seleccion.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Credenciales incorrectas.";
        }
    } else {
        // El usuario no existe en la base de datos
        echo "Credenciales incorrectas.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
