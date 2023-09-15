<?php
include("db.php");
include("Includes/sessionSecurity.php");

if(isset($_GET['documento'])) {

  $documento = $_GET['documento'];
  
  $query = "DELETE FROM funcionarios WHERE documento = ?";
  
  $stmt = mysqli_prepare($conn, $query);
  
  mysqli_stmt_bind_param($stmt, "s", $documento);
  
  if(mysqli_stmt_execute($stmt)) {
    // Eliminación exitosa
    $_SESSION['message'] = 'Usuario eliminado de la base de datos';
    $_SESSION['message_type'] = 'success';
  } else {
    // Error al ejecutar la consulta
    $_SESSION['message'] = 'Error al eliminar al usuario';
    $_SESSION['message_type'] = 'danger';
  }
  
  mysqli_stmt_close($stmt);
  
  header('Location: moduloInfo.php');
  exit;
}
?>
