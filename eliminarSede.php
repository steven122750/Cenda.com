<?php
session_start();
include("Includes/sessionSecurity.php");
include("db.php");


if (isset($_GET['nombre'])) {

  $nombre = $_GET['nombre'];

  $query = "DELETE FROM sede WHERE nombre = ?";

  $stmt = mysqli_prepare($conn, $query);

  mysqli_stmt_bind_param($stmt, "s", $nombre);

  if (mysqli_stmt_execute($stmt)) {
    // Eliminación exitosa
    $_SESSION['message'] = 'Sede eliminada de la base de datos';
    $_SESSION['message_type'] = 'success';
  } else {
    // Error al ejecutar la consulta
    $_SESSION['message'] = 'Error al eliminar la sede seleccionada';
    $_SESSION['message_type'] = 'danger';
  }

  mysqli_stmt_close($stmt);

  header('Location: registroSede.php');
  exit;
}
?>