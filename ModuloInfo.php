<!DOCTYPE html>
<html lang="en">

<?php

      include("Includes/Head.php")

  ?>

<?php include("db.php"); ?>

<body>

    <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 20vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
    </div>
    <h4 class="mb-4">Funcionarios registrados</h4>

    <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento" />
    <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre" />

    <button onclick="tableToExcel('tablaFuncionarios', 'Registros de funcionarios')" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
        <button class="btn btn-primary" type="submit" id="regUsBtn">Registrar funcionario</button>
        <script>
          document.getElementById("regUsBtn").addEventListener("click", function() {
                   window.location.href = "RegistroUsuario.php";
               });
       </script>
        <button id="btnEditar" class="btn btn-primary">Gestionar usuario seleccionado</button>
    
    <div style="max-height: 300px; overflow-y: auto;">

    <table class="table" id="tablaFuncionarios">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Documento</th>
            <th scope="col">Cargo</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          $query = "SELECT * FROM funcionarios";
          $result= mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['documento']; ?></td>
            <td><?php echo $row['cargo']; ?></td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
   
    <?php

      include("Includes/Footer.php")

    ?>

</body>
</html>