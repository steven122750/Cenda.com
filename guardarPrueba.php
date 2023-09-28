<?php
session_start();
include("Includes/sessionSecurity.php");
include("db.php");

$nombre = '';
$documento = '';
$sede = '';

if (isset($_GET['documento'])) {
    $documento = $_GET['documento'];
    $query = "SELECT * FROM funcionarios WHERE documento = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $documento);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $sede = $row['sede'];
    }
}

if (isset($_POST['guardarPrueba'])) {

    $nombreFuncionario = $_POST['pruebaNombreFuncionario'];
    $documentoFuncionario = $_GET['documento'];

    $nombreTomador = $_POST['pruebaNombreTomador'];
    $docTomador = $_POST['pruebaDocTomador'];

    $numeroPrueba = $_POST['numeroPrueba'];
    $resultado = $_POST['resultadoPrueba'];
    $mg = $_POST['mg'];
    $grado = $_POST['grado'];

    $fecha = date("Y-m-d H:i:s");

    $sede = $_POST['sedeFuncForm'];

    // Verificar si se proporcionó una foto
    if (!empty($_FILES['fotoResultado']['name'])) {
        $fotoNombre = $_FILES['fotoResultado']['name'];
        $fotoTmp = $_FILES['fotoResultado']['tmp_name'];
        $fotoRuta = "Foto/" . $fotoNombre;

        // Mover la foto al directorio de destino
        if (move_uploaded_file($fotoTmp, $fotoRuta)) {
            // La foto se ha cargado con éxito
        } else {
            // Error al cargar la foto
            $_SESSION['message'] = 'Error al cargar la foto del resultado.';
            $_SESSION['message_type'] = 'danger';
            header("location: moduloInfo.php");
            exit(); // Sale del script
        }
    } else {
        // Si no se proporciona una foto, dejamos la ruta de la foto como NULL
        $fotoRuta = NULL;
    }

    if ($resultado == "Negativo") {
        $mg = 0;
        $grado = 0;
    } else {
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

    $query = "INSERT INTO prueba(numeroPrueba, fecha, nombreFuncionario, documentoFuncionario, resultado, mg, grado, nombreTomador, documentoTomador, sede, fotoResultado) 
    VALUES ($numeroPrueba, '$fecha', '$nombreFuncionario', '$documentoFuncionario', '$resultado', $mg, '$grado', '$nombreTomador', '$docTomador', '$sede', ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $fotoRuta);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        $_SESSION['message'] = 'Error, verifica los datos ingresados o revisa si el número de prueba ya está registrado';
        $_SESSION['message_type'] = 'danger';
      
    } else {
        $_SESSION['message'] = 'Prueba registrada correctamente';
        $_SESSION['message_type'] = 'success';

    }
     header("location: moduloInfo.php");
}

?>

<?php

include("Includes/Head.php");
include("Includes/nav.php");

?>

<body>
<div class="container mt-3" style="height: 470px; overflow-y: auto;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form class="container-form" action="guardarPrueba.php?documento=<?php echo $_GET['documento']; ?>"
                method="POST" enctype="multipart/form-data">
            
                <h4>Registrar prueba</h4>

                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="pruebaNombreFuncionario"
                        placeholder="Nombre del funcionario" value="<?php echo $nombre ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="pruebaDocumentoFuncionario"
                        placeholder="Documento del funcionario" value="<?php echo $documento ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="sedeFuncForm" placeholder="Sede"
                        value="<?php echo $sede ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="pruebaNombreTomador"
                        placeholder="Nombre de quien realiza" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="pruebaDocTomador"
                        placeholder="Documento de quien realiza" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-input" name="numeroPrueba"
                        placeholder="Número de prueba" required>
                </div>
                <div class="form-group">
                    <div>Resultado de la prueba</div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault1"
                            value="Positivo">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Positivo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="resultadoPrueba" id="flexRadioDefault2"
                            value="Negativo" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Negativo
                        </label>
                    </div>
                </div>

                <div class="form-group" id="fotoResultado">
                    <!-- Agregamos un campo de carga de archivos -->
                    <label for="inputFotoResultado">Sube una foto del resultado (opcional)</label>
                    <input type="file" class="form-control-file" id="inputFotoResultado" name="fotoResultado">
                </div>

                <div class="form-group" id="textoAdicional">
                    <input id="form3Example5" type="number" class="form-control custom-input" placeholder="Mg de alcohol"
                        name="mg" step="0.01">
                    <label for="gradoAlcohol" id="gradoAlcoholLabel"></label>
                    <input type="hidden" id="gradoAlcohol" name="grado" value="Grado de alcohol">
                </div>

                <div class="text-center mt-1 mb-4"> <!-- Added margin-bottom class (mb-4) -->
                    <button type="submit" id="btnSiguiente" class="btn btn-primary btn-lg" style="width: 100%;"
                        name="guardarPrueba">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>





</body>


<footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="JS/scriptRegistro.js"></script>


    <?php

    include("Includes/Footer.php");

    ?>

</footer>