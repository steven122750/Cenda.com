<?php

include("db.php");


if (isset($_POST['guardarPrueba'])) {

    $nombreFuncionario = $_POST['pruebaNombreFuncionario'];
    $documentoFuncionario = $_POST['pruebaDocumentoFuncionario'];
    $numeroPrueba = $_POST['numeroPrueba'];
    $mg = $_POST['mg'];
    $fecha = date("Y-m-d H:i:s");
    $resultado = $_POST['resultadoPrueba'];
    

    
    $query = "INSERT INTO prueba(nombre, cargo, documento, sede) VALUES ('$nombreFuncionario', '$cargoFuncionario', '$documentoFuncionario',
    '$sedeFuncionario')";
 
    $result = mysqli_query($conn, $query);
 
    if(!$result){
     die("Query failed");
    }else{
     echo "Guardado";
    }

}

   
?>