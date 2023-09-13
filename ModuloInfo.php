<!DOCTYPE html>
<html lang="en">

<?php

    include("Includes/Head.php");
    include("Includes/sessionSecurity.php");

 

  ?>

<?php include("db.php"); ?>

<body>

    <div class="col-md-12 d-flex align-items-start justify-content-center" style="height: 15vh;">
        <img src="https://cdacenda.com/wp-content/uploads/2022/05/cenda-footer.png" alt="Imagen" class="img-fluid mb-4" style="max-width: 300px;" />
    </div>
    <h4 class="mb-4">Funcionarios registrados</h4>

    <input type="text" id="documentoInput" class="form-control form-control-lg" placeholder="Buscar por documento" />
    <input type="text" id="nombreInput" class="form-control form-control-lg" placeholder="Buscar por nombre" />
  
    <select class="form-select form-select-lg mb-3" id="sedeSelect" aria-label=".form-select-lg example">
      
      <option value="Cenda Armenia">Cenda Armenia</option>
      <option value="Cenda Buenaventura">Cenda Buenaventura</option>
      <option value="CDA Quimbaya SAS">CDA Quimbaya SAS</option>
      <option value="CDA Olmo">CDA Olmo</option>
    </select>

    <button onclick="tableToExcel('tablaFuncionarios', 'Registros de funcionarios')" id="exportButton" class="btn btn-primary">Exportar registros a Excel</button>
        <button class="btn btn-primary" type="submit" id="regUsBtn">Registrar funcionario</button>
        <script>
          document.getElementById("regUsBtn").addEventListener("click", function() {
                   window.location.href = "RegistroUsuario.php";
               });
       </script>
    
    <div style="max-height: 300px; overflow-y: auto;">

    <table class="table" id="tablaFuncionarios">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Sede</th>
            <th scope="col">Nombre</th>
            <th scope="col">Documento</th>
            <th scope="col">Cargo</th>
            <th scope="col">Editar o eliminar</th>
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
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    function confirmarEliminar(documento) {
        if (confirm("¿Estás seguro de que deseas eliminar este funcionario?")) {
            // Si el usuario confirma, redirecciona a la página de eliminación
            window.location.href = "eliminarFuncionario.php?documento=" + documento;
        }
    }
</script>



    </div>
   
    <?php

      include("Includes/Footer.php")

    ?>

</body>
</html>