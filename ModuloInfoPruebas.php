<!DOCTYPE html>
<html lang="es">

<?php


include("Includes/sessionSecurity.php");
include("db.php");
include("Includes/nav.php");

?>

<?php

if (isset($_SESSION['message'])) { ?>
    <div id="alert-message"
        class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show"
        role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php

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
        <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 12vh;">
            <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen"
                class="img-fluid mb-4" style="max-width: 150px;" />
        </div>
        <h4 class="mb-2">Pruebas de alcoholemia registradas</h4>

        <div class="row">
            <div class="col-md-4">
                <select class="form-select mb-3" id="sedeSelectPruebas" aria-label=".form-select-lg example">

                    <option value="Sede" disabled selected>Selecciona una sede</option>

                    <?php


                    $query = "SELECT * FROM sede";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>

                    <?php } ?>


                </select>
            </div>

            <div class="col-md-4">
                <input type="text" id="documentoInput" class="form-control"
                    placeholder="Buscar por documento del funcionario" />
            </div>
            <div class="col-md-4">
                <input type="text" id="nombreInput" class="form-control"
                    placeholder="Buscar por nombre del funcionario" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <input type="date" id="fechaInicio" class="form-control" placeholder="Fecha de inicio" />
            </div>
            <div class="col-md-4">
                <input type="date" id="fechaFin" class="form-control" placeholder="Fecha de fin" />
            </div>
            <div class="col-md-4">
                <button onclick="filterByDate()" class="btn btn-primary">Confirmar rango de fechas seleccionas</button>
            </div>
        </div>

        <div class="btn-container mt-0.2">
            <button onclick="exportToExcelWithFilters()" id="exportButton" class="btn btn-primary">Exportar registros a
                Excel</button>
        </div>

        <div style="max-height: 300px; overflow-y: auto;">
            <table id="tablaRegistros" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sede</th>
                        <th scope="col">Fecha de prueba</th>
                        <th scope="col">Número de prueba</th>
                        <th scope="col">Nombre del funcionario</th>
                        <th scope="col">Documento del funcionario</th>
                        <th scope="col">Resultado de la prueba</th>
                        <th scope="col">Mg de alcohol registrados</th>
                        <th scope="col">Grado de alcohol</th>
                        <th scope="col">Nombre de quien toma la prueba</th>
                        <th scope="col">Documento de quien toma la prueba</th>
                        <th scope="col">Foto de evidencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM prueba";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['sede']; ?>
                            </td>
                            <td>
                                <?php echo $row['fecha']; ?>
                            </td>
                            <td>
                                <?php echo $row['numeroPrueba']; ?>
                            </td>
                            <td>
                                <?php echo $row['nombreFuncionario']; ?>
                            </td>
                            <td>
                                <?php echo $row['documentoFuncionario']; ?>
                            </td>
                            <td>
                                <?php echo $row['resultado']; ?>
                            </td>
                            <td>
                                <?php echo $row['mg']; ?>
                            </td>
                            <td>
                                <?php echo $row['grado']; ?>
                            </td>
                            <td>
                                <?php echo $row['nombreTomador']; ?>
                            </td>
                            <td>
                                <?php echo $row['documentoTomador']; ?>
                            </td>

                            <td>
                                <a href="verFoto.php?documento=<?php echo $row['documentoFuncionario']; ?>" class="btn btn-primary">Ver
                                    Foto</a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <script src="JS/scriptModuloInfoPruebas.js"></script>
        <?php
        include("Includes/Footer.php");
        ?>
    </footer>
</body>

</html>