<!DOCTYPE html>
<html lang="es">

<?php

      include("Includes/Head.php")

  ?>


<body>
    
    <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 15vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
    </div>
    <h4 class="mb-4">Pruebas de alcoholemia registradas</h4>

    <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento del funcionario" />
    <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre del funcionario" />

    <div class="btn-container mt-3"> 
        <button onclick="tableToExcel('tablaRegistros', 'Registros de pruebas de alcoholemia')" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
        <button class="btn btn-primary" type="submit" id="regAlc">Registrar prueba de alcoholemia</button>

        <script>
           document.getElementById("regAlc").addEventListener("click", function() {
                    window.location.href = "Registro.html";
                });
        </script>

    </div>
    
    <div style="max-height: 300px; overflow-y: auto;">

    <table id="tablaRegistros" class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
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
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>10/09/2023</td>
            <td>6543</td>
            <td>Fernando Toro</td>
            <td>18767676658</td>
            <td>Positivo</td>
            <td>50</td>
            <td>1</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>11/09/2023</td>
            <td>1234</td>
            <td>Mark Otto</td>
            <td>10988767876</td>
            <td>Negativo</td>
            <td>0</td>
            <td>0</td>
            <td>Jacob Janes</td>
            <td>1987827878</td>
          </tr>
         
        </tbody>

      </table

    </div>
   
</body>

<?php

      include("Includes/Footer.php")

  ?>

</html>