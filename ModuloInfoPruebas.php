<!DOCTYPE html>
<html lang="es">

<?php

  include("Includes/Head.php");
  include("db.php");
  include("Includes/sessionSecurity.php");

  ?>

<body>
    
    <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 15vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
    </div>
    <h4 class="mb-4">Pruebas de alcoholemia registradas</h4>

    <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento del funcionario" />
    <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre del funcionario" />

    <select class="form-select form-select-lg mb-3" id="sedeSelect" aria-label=".form-select-lg example">
      
      <option value="Cenda Armenia">Cenda Armenia</option>
      <option value="Cenda Buenaventura">Cenda Buenaventura</option>
      <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
      <option value="CDA Olmo">CDA Olmo</option>
    </select>


    <div class="btn-container mt-3"> 
        <button onclick="tableToExcel('tablaRegistros', 'Registros de pruebas de alcoholemia')" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
        <button class="btn btn-primary" type="submit" id="regAlc">Registrar prueba de alcoholemia</button>

        <script>
           document.getElementById("regAlc").addEventListener("click", function() {
                    window.location.href = "Registro.php";
                });
        </script>

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
            <th scope="col">Editar datos</th>
          </tr>
        </thead>
        <tbody>
      
        <?php
                        $query = "SELECT * FROM prueba";
                        $result= mysqli_query($conn, $query);    

                        while($row = mysqli_fetch_assoc($result)) { ?>
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



                            <td>
                              <a href="editarPrueba.php?numeroPrueba=<?php echo $row['numeroPrueba']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                              </a>
          
                            </td>
                            
                        </tr>


                        
                    <?php } ?>
                     
            
         
        </tbody>

      </table

    </div>
   
</body>

<?php

      include("Includes/Footer.php")

  ?>

</html>