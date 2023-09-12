<?php

include("db.php");


if (isset($_POST['guardarPrueba'])) {

    $nombreFuncionario = $_POST['pruebaNombreFuncionario'];
    $documentoFuncionario = $_POST['pruebaDocumentoFuncionario'];

    $nombreTomador =  $_POST['pruebaNombreTomador'];
    $docTomador = $_POST['pruebaDocTomador'];

    $numeroPrueba = $_POST['numeroPrueba'];
    $resultado = $_POST['resultadoPrueba'];
    $mg = $_POST['mg'];
    $grado = $_POST['grado'];

    $fecha = date("Y-m-d H:i:s");

    $sede = $_POST['sedeFuncForm'];


    if($resultado=="Negativo"){
        $mg = 0;
        $grado = 0;

    }else{
        
        if ($mg >= 0 && $mg < 20) {
            $grado = 0;
        } elseif ($mg >= 20 && $mg < 40) {
            $grado = 0;
        } elseif ($mg >= 40 && $mg < 100) {
            $grado = 1;
        } elseif ($mg >= 100 && $mg <= 150) {
            $grado = 2;
        } elseif ($mg >= 150) {
            $grado = 3;
        } 
    }
        
   
    $query = "INSERT INTO prueba(numeroPrueba, fecha, nombreFuncionario, documentoFuncionario, resultado, mg, grado, nombreTomador, documentoTomador, sede) 
    VALUES ($numeroPrueba, '$fecha', '$nombreFuncionario', '$documentoFuncionario', '$resultado', $mg, '$grado', '$nombreTomador', '$docTomador', '$sede')";
    
 
    $result = mysqli_query($conn, $query);
 
    if(!$result){
     die("Query failed". mysqli_error($conn)); 
    }else{
     echo "Guardado";
    }
}

   
?>