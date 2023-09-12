<?php

include("db.php");

if(isset($_GET['documento'])) {
  $documento = $_GET['documento'];
  $query = "DELETE FROM funcionarios WHERE documento = $documento";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario eliminado de la base de datos';
  $_SESSION['message_type'] = 'danger';
  header('Location: moduloInfo.php');
}

?>