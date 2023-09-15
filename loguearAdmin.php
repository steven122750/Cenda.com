<?php
include("db.php");

session_start();

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
            header("Location: moduloInfoPruebas.php");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['message'] = 'Contraseña incorrecta';
            $_SESSION['message_type'] = 'danger';
            header("Location: index.php");
        }
    } else {
        // Usuario no registrado
        $_SESSION['message'] = 'No te encuentras registrado';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);




?>