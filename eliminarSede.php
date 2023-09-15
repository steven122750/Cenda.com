<?php
include("db.php");
include("Includes/sessionSecurity.php");

if(isset($_GET['nombre'])) {
  $nombreSede = $_GET['nombre'];
  
  // Usar sentencia preparada para la eliminación segura
  $query = "DELETE FROM sede WHERE nombre = ?";
  $stmt = mysqli_prepare($conn, $query);
  
  if($stmt === false) {
    // Manejar el error de preparación
    $_SESSION['message'] = 'Error al eliminar la sede';
    $_SESSION['message_type'] = 'danger';
    header('Location: moduloInfo.php');
    exit;
  }

  // Vincular el valor del nombre a la consulta
  mysqli_stmt_bind_param($stmt, "s", $nombreSede);
  
  if(mysqli_stmt_execute($stmt)) {
    // Eliminación exitosa
    $_SESSION['message'] = 'Sede eliminada de la base de datos';
    $_SESSION['message_type'] = 'success';
  } else {
    // Manejar el error de ejecución
    $_SESSION['message'] = 'Error al eliminar la sede';
    $_SESSION['message_type'] = 'danger';
  }
  
  mysqli_stmt_close($stmt);
  header('Location: moduloInfo.php');
  exit;
}
?>
