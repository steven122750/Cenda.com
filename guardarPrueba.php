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

<?php

include("Includes/Head.php");
include("Includes/nav.php");

?>
<body>

<div class="container d-flex justify-content-center align-items-center vh-50 mt-2"> <!-- Reducí la altura y agregué mt-1 -->
    <form class="container-form" method="POST" action="guardarPrueba.php" id="formularioResultado">
        <!-- Personaliza el estilo de los campos de entrada para hacerlos más pequeños -->

        <h5>Registrar prueba de alcoholemia</h5>

        <div class="form-group">
            <input type="text" class="form-control custom-input" name="pruebaNombreFuncionario" placeholder="Nombre del funcionario">
        </div>
        <div class="form-group">
            <input type="text" class="form-control custom-input" name="pruebaDocumentoFuncionario" placeholder="Documento del funcionario">
        </div>
        <div class="form-group">
            <input type="text" class="form-control custom-input" name="sedeFuncForm" placeholder="Sede">
        </div>
        <div class="form-group">
            <input type="text" class="form-control custom-input" name="pruebaNombreTomador" placeholder="Nombre de quien realiza">
        </div>
        <div class="form-group">
            <input type="text" class="form-control custom-input" name="pruebaDocTomador" placeholder="Documento de quien realiza">
        </div>
        <div class="form-group">
            <input type="text" class="form-control custom-input" name="numeroPrueba" placeholder="Número de prueba">
        </div>
        <div class="form-group">
            <div>Resultado de la prueba</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault1" value="Positivo">
                <label class="form-check-label" for="flexRadioDefault1">
                    Positivo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault2" value="Negativo" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Negativo
                </label>
            </div>
        </div>

        <div class="form-group" id="textoAdicional" style="display: none;">
            <input type="number" class="form-control custom-input" placeholder="Mg de alcohol" name="mg" step="0.01">
            <label for="gradoAlcohol" id="gradoAlcoholLabel"></label>
            <input type="hidden" id="gradoAlcohol" name="grado" value="Grado de alcohol"> 
        </div>  
        
        <div class="text-center mt-3">
            <button type="submit" id="btnSiguiente" class="btn btn-primary btn-lg" style="width: 100%;" name="guardarPrueba">Registrar</button>
        </div>
    </form>
</div>



</body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<footer>
<?php

include("Includes/Footer.php");

?>
</footer>