<?php

session_start();
include("db.php");


if (isset($_POST['guardarAdmin'])) {


    $documentoAdmin = $_POST['documentoAdmin'];
    $correoAdmin = $_POST['correoAdmin'];
    $nombreAdmin = $_POST['nombreAdmin'];
    $contrasena = $_POST['pass'];

    $contrasenaConfirm = $_POST['confirmPass'];

    if ($contrasena == $contrasenaConfirm) {


        // Genera el hash de la contraseña
        $hashContraseña = password_hash($contrasena, PASSWORD_DEFAULT);

        // Inserta el nuevo administrador en la base de datos
        $query = "INSERT INTO administradores (documento, correo, nombre, pass) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $documentoAdmin, $correoAdmin, $nombreAdmin, $hashContraseña);

        if (mysqli_stmt_execute($stmt)) {

            $_SESSION['message'] = 'Administrador guardado con éxito';
            $_SESSION['message_type'] = 'succeFss';
            header("Location: registroAdmin.php");

        } else {
            $_SESSION['message'] = 'Error al guardar, revisa la información ingresada';
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