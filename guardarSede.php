<?php
session_start();
include("Includes/sessionSecurity.php");
include("db.php");



if (isset($_POST['guardarSede'])) {
    $nombreSede = $_POST['nombreSede'];


    $query = "INSERT INTO sede(nombre) VALUES ('$nombreSede')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        $_SESSION['message'] = 'Error, verifica los datos ingresados o verifica si el documento ya esta ingresado';
        $_SESSION['message_type'] = 'danger';
    } else {
        $_SESSION['message'] = 'Sede guardada con éxito';
        $_SESSION['message_type'] = 'success';
    }

    header('Location: registroSede.php');
    exit();
}