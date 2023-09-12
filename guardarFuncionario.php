<?php

include("db.php");


if (isset($_POST['guardarFuncionario'])) {

    $nombreFuncionario = $_POST['nombreFuncionario'];
    $documentoFuncionario = $_POST['documentoFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $sedeFuncionario = $_POST['sedeFuncionario'];

    $query1 = "SELECT * FROM funcionarios";
    $result1 = mysqli_query($conn, $query1);    

    $query = "INSERT INTO funcionarios(documento, nombre, cargo, sede) VALUES ('$documentoFuncionario', '$nombreFuncionario', '$cargoFuncionario',
    '$sedeFuncionario')";
 
    $result = mysqli_query($conn, $query);
 
    if(!$result){
        $_SESSION['message'] = 'Error';
        $_SESSION['message_type'] = 'alert';
        header('Location: RegistroUsuario.php');
    }else{
        $_SESSION['message'] = 'Funcionario guardado con éxito';
        $_SESSION['message_type'] = 'success';
        header('Location: RegistroUsuario.php');
    }


   /* while($row = mysqli_fetch_assoc($result1)) {

        $docBd = $row['documento'];

        if($documentoFuncionario!=$docBd){

            $query = "INSERT IN TO funcionarios(documento, nombre, cargo, sede) VALUES ('$documentoFuncionario', '$nombreFuncionario', '$cargoFuncionario',
            '$sedeFuncionario')";
         
            $result = mysqli_query($conn, $query);
         
            if(!$result){
             die("Error");
            }else{
                die ("Registrado");
            }

        }else{
            echo "El funcionario ya se encuentra registrado";
        }
    } 
    */
    }


?>