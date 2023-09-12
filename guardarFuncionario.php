<?php

include("db.php");


if (isset($_POST['guardarFuncionario'])) {

    $nombreFuncionario = $_POST['nombreFuncionario'];
    $documentoFuncionario = $_POST['documentoFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $sedeFuncionario = $_POST['sedeFuncionario'];


   $query = "INSERT INTO funcionarios(documento, nombre, cargo, sede) VALUES ('$documentoFuncionario', '$nombreFuncionario', '$cargoFuncionario',
   '$sedeFuncionario')";

   $result = mysqli_query($conn, $query);

   if(!$result){
    die("Query failed");
   }else{
 
    
   
   }
}
   
?>