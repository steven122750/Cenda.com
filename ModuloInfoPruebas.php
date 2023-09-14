<!DOCTYPE html>
<html lang="es">

<?php

 
  include("db.php");
  include("Includes/sessionSecurity.php");
  Include("Includes/nav.php");

  ?>


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
                    <option value="sede" disabled selected>Selecciona una sede</option>
                    <option value="Cenda Armenia">Cenda Armenia</option>
                    <option value="Cenda Buenaventura">Cenda Buenaventura</option>
                    <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
                    <option value="CDA Olmo">CDA Olmo</option>
                </select>
            </div>

            <div class="col-md-4">
                <input type="text" id="documentoInput" class="form-control" placeholder="Buscar por documento del funcionario" />
            </div>
            <div class="col-md-4">
                <input type="text" id="nombreInput" class="form-control" placeholder="Buscar por nombre del funcionario" />
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
        <button onclick="exportToExcelWithFilters()" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM prueba";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['sede']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><?php echo $row['numeroPrueba']; ?></td>
                            <td><?php echo $row['nombreFuncionario']; ?></td>
                            <td><?php echo $row['documentoFuncionario']; ?></td>
                            <td><?php echo $row['resultado']; ?></td>
                            <td><?php echo $row['mg']; ?></td>
                            <td><?php echo $row['grado']; ?></td>
                            <td><?php echo $row['nombreTomador']; ?></td>
                            <td><?php echo $row['documentoTomador']; ?></td>
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
