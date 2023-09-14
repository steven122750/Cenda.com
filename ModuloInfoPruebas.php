<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cenda Soft</title>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/deca82b728.js" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
   <script src = "JS/scriptModuloInfoPruebas.js"></script>
    <link rel="stylesheet" href="styles.css">



</head> 




<?php

 
  include("db.php");
  include("Includes/sessionSecurity.php");
  Include("Includes/nav.php");

  ?>


<body>
    <div class="container mt-4">
        <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 15vh;">
            <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
        </div>
        <h4 class="mb-4">Pruebas de alcoholemia registradas</h4>

        <div class="row">

          <div class="col-md-4">
               <select class="form-select form-select-lg mb-3" id="sedeSelectPruebas" aria-label=".form-select-lg example">
               <option value="Cenda Armenia" disabled selected>Selecciona una sede</option>
                  <option value="Cenda Armenia">Cenda Armenia</option>
                   <option value="Cenda Buenaventura">Cenda Buenaventura</option>
                  <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
                  <option value="CDA Olmo">CDA Olmo</option>
                </select>
          </div>

            <div class="col-md-4">
                <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento del funcionario" />
            </div>
            <div class="col-md-4">
                <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre del funcionario" />
            </div>
        </div>

        <div class="btn-container mt-0.2"> 
            <button onclick="tableToExcel('tablaRegistros', 'Registros de pruebas de alcoholemia')" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
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
            </table>
        </div>
    </div>

    

</body>



<footer>

<?php

      include("Includes/Footer.php")

  ?>
</footer>



</html>