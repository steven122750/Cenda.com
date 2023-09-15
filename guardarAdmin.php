<?php

include("db.php");
include("Includes/sessionSecurity.php");

session_start();


if (isset($_POST['guardarAdmin'])) {


    $documentoAdmin = $_POST['documentoAdmin'];
    $correoAdmin = $_POST['correoAdmin'];
    $nombreAdmin = $_POST['nombreAdmin'];
    $contrasena = $_POST['pass'];

    $contrasenaConfirm = $_POST['confirmPass'];

    if ($contrasena == $contrasenaConfirm) {


        // Generar el hash de la contraseña
        $hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO administradores (documento, correo, nombre, pass) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $documentoAdmin, $correoAdmin, $nombreAdmin, $hashContraseña);

        if (mysqli_stmt_execute($stmt)) {

            $_SESSION['message'] = 'Administrador guardado con éxito';
            $_SESSION['message_type'] = 'success';
            header("Location: registroAdmin.php");

        } else {
            $_SESSION['message'] = 'Error, revisa los datos ingresados. Puede ser que el correo o el documento ya estén registrados';
            $_SESSION['message_type'] = 'danger';
            header("Location: registroAdmin.php");
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } else {
        $_SESSION['message'] = 'Las contraseñas no coincicen';
        $_SESSION['message_type'] = 'danger';
        header("Location: registroAdmin.php");
    }
}

?>