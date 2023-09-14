<!DOCTYPE html>
<html lang="en">

<?php

   
    include("Includes/sessionSecurity.php");
    Include("Includes/nav.php");
    Include("Includes/Head.php");

  ?>

<?php include("db.php"); ?>

<?php

if (isset($_SESSION['message'])) { ?>
    <div id="alert-message" class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php

    // Elimina el mensaje y el tipo de la sesión después de mostrarlo
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

<script>
    // Cierra la alerta después de 5 segundos (5000 ms)
    setTimeout(function () {
        var alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 3000); 
</script>


<body>


    <div class="container mt-4">
        <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 15vh;">
            <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        </div>

        <h4 class="mb-4">Funcionarios registrados</h4>

        <div class="row">

            <div class="col-md-4">
                <select class="form-select form-select-lg mb-3" id="sedeSelect" aria-label=".form-select-lg example">
                <option value="sede" disabled selected>Selecciona una sede</option>
                    <option value="Cenda Armenia">Cenda Armenia</option>
                    <option value="Cenda Buenaventura">Cenda Buenaventura</option>
                    <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
                    <option value="CDA Olmo">CDA Olmo</option>
                </select>
            </div>

            <div class="col-md-4">
                
                <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento"  />
                
            </div>
            <div class="col-md-4">
                <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre" />
            </div>
        </div>

        <button onclick="tableToExcel('tablaRegistros', 'Registros de pruebas de alcoholemia', $('#sedeSelectPruebas').val());" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>


        <div style="max-height: 300px; overflow-y: auto;">
            <table class="table" id="tablaFuncionariosInfo">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sede</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php
        $query = "SELECT * FROM funcionarios";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['sede']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['documento']; ?></td>
                <td><?php echo $row['cargo']; ?></td>
                <td>
                    <a href="editarFuncionario.php?documento=<?php echo $row['documento'] ?>" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmarEliminar(<?php echo $row['documento']; ?>)">
                        <i class="far fa-trash-alt"></i>
                    </a>

                    <a href="guardarPrueba.php?documento=<?php echo $row['documento'] ?>" class="btn btn-secondary">
                    <i class="fa-regular fa-address-card"></i>
                    Prueba de alcoholemia
                    </a>

                    
                </td>
            </tr>
        <?php } ?>

                </tbody>
            </table>
        </div>
       
    </div>

    <footer>

    <script src = "JS/scriptModuloInfo.js"></script>

    <?php
        include("Includes/Footer.php");
            
    ?>

    </footer>
         
    <script>
    function confirmarEliminar(documento) {
        if (confirm("¿Estás seguro de que deseas eliminar este funcionario?")) {
            // Si el usuario confirma, redirecciona a la página de eliminación
            window.location.href = "eliminarFuncionario.php?documento=" + documento;
        }
    }
</script>

</body>


</html>