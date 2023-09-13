<?php

session_start();
if (!isset($_SESSION['documentoAdmin'])) {
    header("Location: index.php");
    exit();
}

?>