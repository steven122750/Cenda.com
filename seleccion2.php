<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php")

  ?>

<body>
    <div class="container text-center">
        
        <div class="col-md-12 d-flex align-items-center justify-content-center" style="height: 50vh;">
            <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        </div>

        <div class="btn-container mt-3"> 
            <button class="btn btn-primary" type="submit" id="regFunBtn">Registrar funcionario</button>
            <button class="btn btn-primary" type="submit" id="rePruBtn">Registrar prueba de alcoholemia</button>
            <button class="btn btn-primary" type="submit" id="verRegistrosBtn">Ver y exportar registros de alcoholemia</button>
            <button class="btn btn-primary" type="submit" id="regFuncioBtn">Ver y exportar registros de funcionarios</button>

            <script>
    
                document.getElementById("regFunBtn").addEventListener("click", function() {
                    window.location.href = "RegistroUsuario.php";
                });
                document.getElementById("rePruBtn").addEventListener("click", function() {
                    window.location.href = "Registro.php";
                });
                document.getElementById("verRegistrosBtn").addEventListener("click", function() {
                    window.location.href = "moduloInfoPruebas.php";
                });
                document.getElementById("regFuncioBtn").addEventListener("click", function() {
                    window.location.href = "ModuloInfo.php";
                });

            </script>
            
        </div>
    </div>

    <?php

include("Includes/Footer.php")

?>

    </body>



</html>